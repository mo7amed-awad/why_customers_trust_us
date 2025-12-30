<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Modules\Category\Entities\Model as Category;

class AdsController extends Controller
{
    public function adsCategories(){
        $categories = Category::all();
        return view('client.ads.ads-categories', compact('categories'));
    }

    public function showCategory($lang, $slug)
    {
        $category = Category::with('subcategories')
            ->where('slug', $slug)
            ->firstOrFail();

        $categories = Category::all();

        // Check if it's an AJAX request
        if (request()->ajax()) {
            $subcategories = $category->subcategories->map(function($subcategory) {
                return [
                    'id' => $subcategory->id,
                    'title' => $subcategory->trans('title'),
                    'desc' => $subcategory->trans('desc'),
                ];
            });

            return response()->json([
                'success' => true,
                'category' => [
                    'id' => $category->id,
                    'title' => $category->trans('title'),
                ],
                'subcategories' => $subcategories
            ]);
        }

        // Normal page load
        return view('client.ads.category-details', compact('categories', 'category'));
    }


}
