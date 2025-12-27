<?php

namespace Modules\Contact\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Contact\Entities\Model;
use Modules\Contact\Http\Requests\ContactRequest;

class APIController extends BasicController
{
    public function store(ContactRequest $request)
    {
        Model::create($request->all());

        return ResponseHelper::make(null, __('trans.addedSuccessfully'));

    }
}
