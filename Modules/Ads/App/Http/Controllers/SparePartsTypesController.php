<?php

namespace Modules\Ads\App\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Ads\Entities\SparePartType;

class SparePartsTypesController  extends BasicController
{
    public function index(Request $request)
    {
        $Models = SparePartType::get();

        return view('ads::spare-part-types.index', compact('Models'));
    }

    public function deleteSelected(Request $request)
    {
        try {
            $ids = $request->ids;
            if (!$ids || !is_array($ids)) {
                return response()->json(['message' => 'لا توجد عناصر محددة'], 400);
            }

            SparePartType::whereIn('id', $ids)->delete();

            return response()->json(['message' => 'تم حذف العناصر المحددة بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function create()
    {
        return view('ads::spare-part-types.create');
    }

    public function store(Request $request)
    {
        $Model = SparePartType::create($request->all());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = SparePartType::where('id', $id)->firstorfail();

        return view('ads::spare-part-types.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = SparePartType::where('id', $id)->firstorfail();

        return view('ads::spare-part-types.edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = SparePartType::where('id', $id)->firstorfail();
        $Model->update($request->all());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = SparePartType::where('id', $id)->delete();
    }
}