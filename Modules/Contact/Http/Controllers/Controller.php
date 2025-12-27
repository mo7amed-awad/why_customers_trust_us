<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Contact\Entities\Model;

class Controller extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::latest()->get();

        return view('contact::index', compact('Models'));
    }

    public function show($id)
    {
        $Model = Model::latest()->find($id);

        return view('contact::show', compact('Model'));
    }
}
