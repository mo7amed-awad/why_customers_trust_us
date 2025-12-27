<?php

namespace Modules\FAQ\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\FAQ\Entities\Model;
use Modules\FAQ\Http\Resources\FAQResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(FAQResource::collection($Models));
    }
}
