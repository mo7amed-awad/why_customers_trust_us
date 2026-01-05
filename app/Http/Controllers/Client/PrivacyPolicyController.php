<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use Modules\Privacy\Entities\Model as Privacy;

class PrivacyPolicyController extends BasicController
{
    public function index(){

        $privacy = Privacy::All();
        return view('Client.privacy-policy', compact('privacy'));
    }
}
