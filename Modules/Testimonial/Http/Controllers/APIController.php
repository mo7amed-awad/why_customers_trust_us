<?php

namespace Modules\Testimonial\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Testimonial\Entities\Model;
use Modules\Testimonial\Http\Resources\TestimonialResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::where('status', 1)
            ->get();

        return ResponseHelper::make(TestimonialResource::collection($Models));
    }
}
