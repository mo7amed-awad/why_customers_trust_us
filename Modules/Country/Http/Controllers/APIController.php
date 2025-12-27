<?php

namespace Modules\Country\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Country\Entities\Model;
use Modules\Country\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::Active()->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
