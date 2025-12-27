<?php

namespace Modules\Specification\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Specification\Entities\Model;
use Modules\Specification\Http\Resources\SpecificationResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(SpecificationResource::collection($Models));
    }
}
