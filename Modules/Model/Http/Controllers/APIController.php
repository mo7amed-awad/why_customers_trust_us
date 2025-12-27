<?php

namespace Modules\Model\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Model\Entities\Model;
use Modules\Model\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index(Request $request)
    {
        $query = Model::Active();

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $Models = $query->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
