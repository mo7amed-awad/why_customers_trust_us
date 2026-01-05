<?php

namespace App\Http\Controllers\Client;

use App\Enums\AdTypesEnum;
use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreAdRequest;
use App\Http\Requests\Client\StoreCarRequest;
use App\Http\Requests\Client\StoreLicensePlatesRequest;
use App\Http\Requests\Client\StoreSparePartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Ads\Entities\Accessory;
use Modules\Ads\Entities\Car;
use Modules\Ads\Entities\Feature as Feature;
use Modules\Ads\Entities\Model as Ad;
use Modules\Ads\Entities\Plate;
use Modules\Ads\Entities\SparePart as SparePart;
use Modules\Ads\Entities\SparePartType;
use Modules\Brand\Entities\Model as Brand;
use Modules\Category\Entities\Model as Category;
use Modules\Category\Entities\Subcategory as Subcategory;
use Modules\Model\Entities\Model as Model;

class AdsController extends Controller
{
    public function index(Request $request, $lang, $slug)
    {
        $brands = Brand::with('models')->get();
        $models = Model::all();

        switch ($slug) {
            case 'cars':
                return $this->handleAds($request, AdTypesEnum::CAR, 'carDetails', 'Client.partials.car-card',$slug);
            case 'spare-parts':
                return $this->handleAds($request, AdTypesEnum::SPARE_PART, 'sparePartDetails', 'Client.partials.spare-part-card', $slug);
            case 'accessories':
                return $this->handleAds($request, AdTypesEnum::ACCESSORY, 'accessoryDetails', 'Client.partials.accessory-card', $slug);
            case 'plates':
                return $this->handleAds($request, AdTypesEnum::LICENSE_PLATE, 'plateDetails', 'Client.partials.plate-card', $slug);
            default:
                abort(404);
        }
    }

    private function handleAds(Request $request, $type, $relation, $cardView, $slug)
    {
        $query = Ad::where('is_active', 1)
            ->where('type', $type)
            ->with([
                $relation,
                'images' => fn($q) => $q->orderBy('id')->limit(1)
            ]);

        $this->applyPriceFilter($query, $request);

        $this->applyBrandModelFilter($query, $request, $relation);

        $this->applySorting($query, $request);

        $items = $query->get();

        $brands = Brand::with('models')->get();
        $models = Model::all();

        return view('Client.ads', compact('items', 'cardView', 'slug', 'brands', 'models','type'));
    }

    private function applyPriceFilter($query, Request $request)
    {
        if ($request->filled(['price_min', 'price_max'])) {
            $query->whereBetween(
                DB::raw('CAST(price AS UNSIGNED)'),
                [(int)$request->price_min, (int)$request->price_max]
            );
        }
    }

    private function applyBrandModelFilter($query, Request $request, $relation)
    {
        $supportsBrandModel = in_array($relation, ['carDetails', 'sparePartDetails']);

        if ($supportsBrandModel && $request->filled('brand')) {
            $query->whereHas($relation, function($q) use ($request) {
                $q->where('brand_id', $request->brand);
            });
        }

        if ($supportsBrandModel && $request->filled('model')) {
            $query->whereHas($relation, function($q) use ($request) {
                $q->where('model_id', $request->model);
            });
        }
    }

    private function applySorting($query, Request $request)
    {
        $sortField = $request->get('sort', 'latest');

        $sortOptions = [
            'latest' => ['field' => 'created_at', 'direction' => 'desc'],
            'oldest' => ['field' => 'created_at', 'direction' => 'asc'],
            'price_asc' => ['field' => DB::raw('CAST(price AS UNSIGNED)'), 'direction' => 'asc'],
            'price_desc' => ['field' => DB::raw('CAST(price AS UNSIGNED)'), 'direction' => 'desc'],
        ];

        $sort = $sortOptions[$sortField] ?? $sortOptions['latest'];
        $query->orderBy($sort['field'], $sort['direction']);
    }

    public function show($lang,$id){

        $item = Ad::find($id);
        return view('Client.details', compact('item'));
    }

    public function adsCategories(){
        $categories = Category::where('slug','!=', 'car-services')->get();
        return view('client.ads.ads-categories', compact('categories'));
    }

    public function showCategory($lang, $slug)
    {
        $category = Category::with('subcategories')
            ->where('slug', $slug)
            ->firstOrFail();

        $categories = Category::where('slug','!=', 'car-services')->get();

        return view('client.ads.category-details', compact('categories', 'category'));
    }

    public function create($lang, $subcategorySlug)
    {
        $subcategory = Subcategory::with('category')->where('slug', $subcategorySlug)->firstOrFail();

        $category = $subcategory->category;
        $brands = Brand::all();
        $models = Model::all();
        $sparePartsTypes = SparePartType::all();
        $features = Feature::all();
        return view('Client.ads.create', compact('category', 'subcategory', 'brands', 'models', 'sparePartsTypes', 'features'));
    }

    public function store(StoreAdRequest $request, $lang, $subcategorySlug)
    {

        $subcategory = Subcategory::with('category')
            ->where('slug', $subcategorySlug)
            ->firstOrFail();

        $category = $subcategory->category;

        $data = $request->validated();
        unset($data['country_code'], $data['images']);

        $ad = new Ad($data);
        $ad->user_id = Auth::id();
        $ad->category_id = $category->id;
        $ad->subcategory_id = $subcategory->id;
        $ad->phone_code = $request->country_code;
        $ad->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = Upload::UploadFile($image, 'Ads');
                $ad->images()->create([
                    'image' => $path
                ]);
            }
        }

        if($category->slug == 'spare-parts'){
            $spareRequest = app(StoreSparePartRequest::class);
            $sparePart = new SparePart($spareRequest->validated());
            $sparePart->ad_id = $ad->id;
            $sparePart->save();
            $ad->update([
               'type' => AdTypesEnum::SPARE_PART
            ]);
        }

        if($category->slug == 'cars'){
            $spareRequest = app(StoreCarRequest::class);
            $validated = $spareRequest->validated();

            $features = $validated['features'] ?? [];
            unset($validated['features']);

            $car = new Car($validated);
            $car->ad_id = $ad->id;
            $car->save();

            $ad->update([
                'type' => AdTypesEnum::CAR
            ]);

            if (!empty($features)) {
                foreach ($features as $featureId => $value) {
                    \DB::table('car_features')->insert([
                        'car_id' => $car->id,
                        'feature_id' => $featureId,
                        'value' => $value ?? 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

        }

        if($category->slug == 'accessories'){
            $accessories = new Accessory();
            $accessories->ad_id = $ad->id;
            $accessories->save();

            $ad->update([
                'type' => AdTypesEnum::ACCESSORY
            ]);
        }

        if($category->slug == 'license-plates'){
            $spareRequest = app(StoreLicensePlatesRequest::class);
            $sparePart = new Plate($spareRequest->validated());
            $sparePart->ad_id = $ad->id;
            $sparePart->save();
            $ad->update([
                'type' => AdTypesEnum::LICENSE_PLATE
            ]);
        }


        return redirect()->route('client.home')->with('success', 'تم إضافة الإعلان بنجاح!');
    }


}
