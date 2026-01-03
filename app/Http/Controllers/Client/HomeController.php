<?php

namespace App\Http\Controllers\Client;

use App\Enums\AdTypesEnum;
use App\Http\Controllers\BasicController;
use Modules\Ads\Entities\Model as Ad;
use Modules\WhoWeAre\Entities\Model as WhoWeAre;
use Modules\Brand\Entities\Model as Brand;
use Modules\Service\Entities\Model as Service;
use Modules\WhyChooseUs\Entities\Model as WhyChooseUs;
use Modules\WhyCustomersTrustUs\Entities\Model as WhyCustomersTrustUs;
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
            ->where('type', AdTypesEnum::CAR)
            ->whereHas('carDetails', fn($q) => $q->where('is_new', 1))
            ->with(['carDetails', 'images' => fn($q) => $q->orderBy('id')->limit(1)])
            ->limit(7)
            ->get();

        $usedCars = Ad::where('is_active', 1)
            ->where('type', AdTypesEnum::CAR)
            ->whereHas('carDetails', fn($q) => $q->where('is_new', 0))
            ->with(['carDetails', 'images' => fn($q) => $q->orderBy('id')->limit(1)])
            ->limit(7)
            ->get();

        $cars = $newCars->concat($usedCars);

        $services = Service::all();

        $spareParts = Ad::where('is_active', 1)
            ->where('type', AdTypesEnum::SPARE_PART)
            ->with(['sparePartDetails', 'images' => fn($q) => $q->orderBy('id')->limit(1)])
            ->limit(7)
            ->get();

        $WhyCustomersTrustUs = WhyCustomersTrustUs::all();
        return view('Client.index', compact('whoWeAre', 'brands', 'whyChooseUs', 'categories', 'cars', 'services', 'spareParts', 'WhyCustomersTrustUs'));
    }


}
