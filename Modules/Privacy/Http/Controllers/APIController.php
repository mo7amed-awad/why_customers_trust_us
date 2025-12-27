<?php

namespace Modules\Privacy\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Modules\Privacy\Entities\Model;

class APIController extends BasicController
{
    public function index()
    {
        return ResponseHelper::make(Model::select('title_'.lang().' AS title', 'desc_'.lang().' AS desc')->get());
    }
}
