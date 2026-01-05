<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Modules\Category\Entities\Model as Category;

class CategoryController extends Controller
{
    public function allCategories(){
        $categories = Category::all();

        return view('Client.all-categories', compact('categories'));
    }
}
