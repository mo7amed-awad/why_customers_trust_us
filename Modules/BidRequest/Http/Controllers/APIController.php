<?php

namespace Modules\BidRequest\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\BidRequest\Entities\Model;
use Modules\BidRequest\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index(Request $request)
    {
        $query = Model::Active();

        if ($request->filled('bidding_id')) {
            $query->where('bidding_id', $request->bidding_id);
        }

        $Models = $query->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
