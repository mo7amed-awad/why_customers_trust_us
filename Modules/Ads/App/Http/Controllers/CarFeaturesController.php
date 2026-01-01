<?php

namespace Modules\Ads\App\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Ads\Entities\Feature;

class CarFeaturesController  extends BasicController
{
    public function index(Request $request)
    {
        $Models = Feature::get();

        return view('ads::car-features.index', compact('Models'));
    }

    public function deleteSelected(Request $request)
    {
        try {
            $ids = $request->ids;
            if (!$ids || !is_array($ids)) {
                return response()->json(['message' => 'لا توجد عناصر محددة'], 400);
            }

            Feature::whereIn('id', $ids)->delete();

            return response()->json(['message' => 'تم حذف العناصر المحددة بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function create()
    {
        return view('ads::car-features.create');
    }

    public function store(Request $request)
    {
        $Model = Feature::create($request->only(['title_ar', 'title_en','type']));

        if ($request->hasFile('icon')) {
            $Model->icon = Upload::UploadFile($request->icon, 'CarFeatures');
        }
        $Model->save();

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Feature::where('id', $id)->firstorfail();

        return view('ads::car-features.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Feature::where('id', $id)->firstorfail();

        return view('ads::car-features.edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = Feature::where('id', $id)->firstorfail();
        $Model->update($request->all());
        if ($request->hasFile('icon')) {
            Upload::deleteImage($Model->icon);
            $Model->icon = Upload::UploadFile($request->icon, 'CarFeatures');
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Feature::where('id', $id)->delete();
    }
}