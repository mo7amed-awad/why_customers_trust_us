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
}
