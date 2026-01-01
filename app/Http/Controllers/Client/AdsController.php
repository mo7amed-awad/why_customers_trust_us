<?php

namespace App\Http\Controllers\Client;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreAdRequest;
use App\Http\Requests\Client\StoreCarRequest;
use App\Http\Requests\Client\StoreSparePartRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Ads\Entities\Car;
use Modules\Ads\Entities\Feature as Feature;
use Modules\Ads\Entities\Model as Ad;
use Modules\Ads\Entities\SparePart as SparePart;
use Modules\Ads\Entities\SparePartType;
use Modules\Brand\Entities\Model as Brand;
use Modules\Category\Entities\Model as Category;
use Modules\Category\Entities\Subcategory as Subcategory;
use Modules\Model\Entities\Model as Model;

class AdsController extends Controller
{
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

        if($category->slug == 'spare-parts'){
            $spareRequest = app(StoreSparePartRequest::class);
            $sparePart = new SparePart($spareRequest->validated());
            $sparePart->ad_id = $ad->id;
            $sparePart->save();
            $ad->update([
               'type' => 'spare-parts'
            ]);
        }

        if($category->slug == 'cars'){
            $spareRequest = app(StoreCarRequest::class);
            $validated = $spareRequest->validated();

            $car = new Car();
            $car->ad_id = $ad->id;
            $car->brand_id = $validated['brand_id'];
            $car->model_id = $validated['model_id'];
            $car->save();

            if (!empty($validated['features'])) {
                foreach ($validated['features'] as $featureId => $value) {
                    \DB::table('car_features')->insert([
                        'car_id' => $car->id,
                        'feature_id' => $featureId,
                        'value' => $value ?? 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            $ad->update([
               'type' => 'cars'
            ]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = Upload::UploadFile($image, 'Ads');
                $ad->images()->create([
                    'image' => $path
                ]);
            }
        }
        return redirect()->route('client.home', app()->getLocale())
            ->with('success', 'تم إضافة الإعلان بنجاح!');
    }


}
