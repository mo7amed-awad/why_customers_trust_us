<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use Modules\Term\Entities\Model as Term;

class TermsConditionsController extends BasicController
{
    public function index(){
        $terms = Term::All();
        return view('Client.terms-conditions',compact('terms'));
    }
}
