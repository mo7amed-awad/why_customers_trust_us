<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use Modules\WhoWeAre\Entities\Model as WhoWeAre;
use Modules\Brand\Entities\Model as Brand;
use Modules\WhyChooseUs\Entities\Model as WhyChooseUs;



class HomeController extends BasicController
{
    public function home()
    {
        $whoWeAre = WhoWeAre::first();
        $brands = Brand::all();
        $whyChooseUs = WhyChooseUs::all();
        return view('Client.index', compact('whoWeAre', 'brands', 'whyChooseUs'));
    }


}
