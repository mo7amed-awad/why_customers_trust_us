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


    public function create()
    {
        return view('ads::create');
    }

    public function store(Request $request)
    {
        $Model = Model::create($request->all());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('ads::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('ads::edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->all());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
}