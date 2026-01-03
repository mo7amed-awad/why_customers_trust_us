<?php

namespace Modules\Service\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Service\Entities\Model;
use Modules\Service\Http\Resources\ServiceResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(ServiceResource::collection($Models));
    }
}
