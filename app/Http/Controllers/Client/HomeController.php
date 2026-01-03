<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use Modules\Ads\Entities\Model as Ad;
use Modules\WhoWeAre\Entities\Model as WhoWeAre;
use Modules\Brand\Entities\Model as Brand;
use Modules\WhyChooseUs\Entities\Model as WhyChooseUs;
use Modules\Category\Entities\Model as Category;



class HomeController extends BasicController
{
    public function home()
    {
        $whoWeAre = WhoWeAre::first();
        $brands = Brand::all();
        $whyChooseUs = WhyChooseUs::all();
        $categories = Category::all();

        $newCars = Ad::where('is_active', 1)
            ->where('type', 'cars')
            ->whereHas('carDetails', fn($q) => $q->where('is_new', 1))
            ->with(['carDetails', 'images' => fn($q) => $q->orderBy('id')->limit(1)])
            ->limit(7)
            ->get();

        $usedCars = Ad::where('is_active', 1)
            ->where('type', 'cars')
            ->whereHas('carDetails', fn($q) => $q->where('is_new', 0))
            ->with(['carDetails', 'images' => fn($q) => $q->orderBy('id')->limit(1)])
            ->limit(7)
            ->get();

        $cars = $newCars->concat($usedCars);

        return view('Client.index', compact('whoWeAre', 'brands', 'whyChooseUs', 'categories', 'cars'));
    }


}
