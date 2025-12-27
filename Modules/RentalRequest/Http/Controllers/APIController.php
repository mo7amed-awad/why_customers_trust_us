<?php

namespace Modules\RentalRequest\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\RentalRequest\Entities\Model;
use Modules\RentalRequest\Http\Resources\Resource;

class APIController extends BasicController
{
    public function index(Request $request)
    {
        $query = Model::Active();

        if ($request->filled('rental_id')) {
            $query->where('rental_id', $request->rental_id);
        }

        $Models = $query->get();
        $data = Resource::collection($Models);

        return ResponseHelper::make($data);
    }
}
