<?php

namespace Modules\Rental\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Rental\Entities\Model;
use Modules\Rental\Http\Resources\RentalResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(RentalResource::collection($Models));
    }
}
