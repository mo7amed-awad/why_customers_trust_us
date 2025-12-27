<?php

namespace Modules\Limousine\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Limousine\Entities\Model;
use Modules\Limousine\Http\Resources\LimousineResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(LimousineResource::collection($Models));
    }
}
