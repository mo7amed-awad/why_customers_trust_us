<?php

namespace Modules\Setting\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Setting\Entities\Model;

class Controller extends BasicController
{
    public function index()
    {
        return $this->show(null);
    }

    public function show($type = null)
    {
        //        $Models = Model::when($type, function ($query, $type) {
        //            return $query->where('type', $type);
        //        })->get();

        // If $type is null, filter by 'publicSettings'; otherwise, use the provided $type.
        $Models = Model::when($type, function ($query, $type) {
            return $query->where('type', $type);
        }, function ($query) {
            return $query->where('type', 'publicSettings');
        })->get();

        return view('setting::edit', compact('Models', 'type'));
    }

    public function create()
    {
        return view('setting::create');
    }

    public function store(Request $request)
    {
        if ($request['valuetype'] == 'description') {
            Model::create($request->only('key', 'type', 'value'));
        }
        if ($request['valuetype'] == 'image') {
            $imageName = Upload::UploadFile($request->file('Imagevalue'), 'Settings');
            Model::create($request->only('key', 'type') + ['value' => $imageName]);
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->route(activeGuard().'.settings.index');
    }

    public function update(Request $request, $id, $type = null)
    {
        if ($request->type) {
            $Models = Model::latest()->where('type', $request->type)->get();
        } else {
            $Models = Model::get();
        }

        foreach ($Models as $Model) {
            if (str_contains($Model['key'], '_image') || str_contains($Model['key'], 'logo')) {
                if ($request->hasFile($Model['key'])) {
                    Upload::deleteImage($Model['value'], 'Settings');
                    Model::latest()->where('key', $Model['key'])->update(['value' => Upload::UploadFile($request[$Model['key']], 'Settings')]);
                }
            } elseif (str_contains($Model['key'], '_images') || str_contains($Model['key'], 'logo')) {
                if ($request->hasFile($Model['key'])) {
                    Upload::deleteImage($Model['value'], 'Settings');
                    Model::latest()->where('key', $Model['key'])->update(['value' => Upload::UploadFiles($request[$Model['key']], 'Settings')]);
                }
            } else {
                Model::latest()->where('key', $Model['key'])->update(['value' => $request->get($Model['key'])]);
            }
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->route(activeGuard().'.settings.index', $request->type);
    }

    public function destroy(Model $Model)
    {
        $Model->delete();

    }
}
