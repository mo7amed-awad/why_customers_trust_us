<?php

namespace Modules\Ads\App\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Ads\Entities\Model;

class AdsController  extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::get();

        return view('ads::index', compact('Models'));
    }

    public function toggleActive(Request $request)
    {
        $ad = Model::findOrFail($request->id);
        $ad->is_active = !$ad->is_active;
        $ad->save();

        return response()->json([
            'status' => 'success',
            'is_active' => $ad->is_active,
        ]);
    }


    public function show($id)
    {
        $ad = Model::with([
            'images',
            'carDetails.features',
            'sparePartDetails',
            'plateDetails',
            'accessoryDetails',
            'category',
            'subcategory',
            'user'
        ])->findOrFail($id);

        return view('ads::show', compact('ad'));
    }

}