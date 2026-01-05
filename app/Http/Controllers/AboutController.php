<?php

namespace App\Http\Controllers;


use Modules\WhoWeAre\Entities\Model as WhoWeAre;
use Modules\OurVision\Entities\Model as OurVision;
use Modules\OurMission\Entities\Model as OurMission;
use Modules\About\Entities\Model as About;

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
