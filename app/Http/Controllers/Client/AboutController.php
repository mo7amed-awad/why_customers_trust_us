<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Modules\About\Entities\Model as About;
use Modules\OurMission\Entities\Model as OurMission;
use Modules\OurVision\Entities\Model as OurVision;
use Modules\WhoWeAre\Entities\Model as WhoWeAre;

class AboutController extends Controller
{
    public function index(){

        $about = About::first();
        $whoWeAre = WhoWeAre::first();
        $ourMission = OurMission::first();
        $ourVision = OurVision::first();
        return view('Client.about', compact('whoWeAre', 'ourMission', 'ourVision', 'about'));
    }
}
