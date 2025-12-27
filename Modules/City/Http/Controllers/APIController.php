<?php

namespace Modules\City\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\City\Entities\Model;
use Modules\City\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index(Request $request)
    {
        $query = Model::Active();

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        $Models = $query->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
