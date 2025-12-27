<?php

namespace Modules\Payment\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Payment\Entities\Model;
use Modules\Payment\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::Active()->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
