<?php

namespace Modules\Bidding\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Bidding\Entities\Model;
use Modules\Bidding\Http\Resources\BiddingResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(BiddingResource::collection($Models));
    }
}
