<?php

namespace Modules\About\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\About\Entities\Model;

class Controller extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::get();

        return view('about::index', compact('Models'));
    }

    public function create()
    {
        return view('about::create');
    }

    public function store(Request $request)
    {

        $Model = Model::create($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));

        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'About');
        }

        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        alert()->success(__('trans.addedSuccessfully'));
        return redirect()->back();
    }




    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('about::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('about::edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('image')) {
            Upload::deleteImage($Model->image);
            $Model->image = Upload::UploadFile($request->image, 'About');
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
