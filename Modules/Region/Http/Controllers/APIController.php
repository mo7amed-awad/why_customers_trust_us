<?php

namespace Modules\Region\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Region\Entities\Model;
use Modules\Region\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index(Request $request)
    {
        $query = Model::Active();

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        $Models = $query->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
