<?php

namespace Modules\WhoWeAre\App\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\WhoWeAre\Entities\Model;

class WhoWeAreController extends BasicController
{
    public function index()
    {
        $Models = Model::get();

        return view('whoweare::index', compact('Models'));
    }


    public function create()
    {
        return view('whoweare::create');
    }

    public function store(Request $request)
    {
        $Model = Model::create($request->only(['desc_ar', 'desc_en']));

        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'WhoWeAre');
        }

        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        alert()->success(__('trans.addedSuccessfully'));
        return redirect()->back();
    }


    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('whoweare::show', compact('Model'));
    }


    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        return view('whoweare::edit', compact('Model'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('image')) {
            Upload::deleteImage($Model->image);
            $Model->image = Upload::UploadFile($request->image, 'WhoWeAre');
        }

        $Model->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $Model = Model::findOrFail($id);

        if ($Model->image) {
            Upload::deleteImage($Model->image);
        }

        $Model->delete();
    }
}
