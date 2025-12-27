<?php

namespace Modules\Brand\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Brand\Entities\Model;
use Modules\Brand\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::Active()->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
