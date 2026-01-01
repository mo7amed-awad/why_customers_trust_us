<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\StoreSparePartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Ads\Entities\SparePartType;
use Modules\Category\Entities\Model as Category;
use Modules\Brand\Entities\Model as Brand;
use Modules\Model\Entities\Model as Model;
use Modules\Ads\Entities\Model as Ad;
use Modules\Ads\Entities\SparePart as SparePart;
use Modules\Category\Entities\Subcategory as Subcategory;

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
        return view('Client.ads.create', compact('category', 'subcategory', 'brands', 'models', 'sparePartsTypes'));
    }

    public function store(Request $request, $lang, $subcategorySlug)
    {
        $imagesData = json_decode($request->images_data, true);
        dd($imagesData);
        $request->validate([
            'images' => 'nullable|array|min:1|max:7',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        foreach ($request->file('images') as $image) {
            $path = $image->store('ads', 'public');
        }

        if ($path) {

            dd($path);
        } else {
            \Log::info($request->all());
            dd('No images received');
        }
        dd($request);
        $subcategory = Subcategory::with('category')
            ->where('slug', $subcategorySlug)
            ->firstOrFail();

        $category = $subcategory->category;

        $ad = new Ad($request->validated());
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

        return redirect()->route('client.home', app()->getLocale())
            ->with('success', 'تم إضافة الإعلان بنجاح!');
    }


}
