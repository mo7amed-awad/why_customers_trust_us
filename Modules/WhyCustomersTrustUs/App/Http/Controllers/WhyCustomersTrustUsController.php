<?php

namespace Modules\WhyCustomersTrustUs\App\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\WhyCustomersTrustUs\Entities\Model;
use Yajra\DataTables\DataTables;

class WhyCustomersTrustUsController extends BasicController
{
    public function index()
    {
        return view('whycustomerstrustus::index');
    }

    public function datatable(Request $request)
    {
        $query = Model::query();

        if (request()->sort_column && request()->sort_direction) {
            $query->orderBy(request()->sort_column, request()->sort_direction);
        }

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('whycustomerstrustus::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('title_ar', function ($Model) {
                return view('whycustomerstrustus::layouts.title_ar', ['Model' => $Model]);
            })
            ->editColumn('title_en', function ($Model) {
                return view('whycustomerstrustus::layouts.title_en', ['Model' => $Model]);
            })
            ->addColumn('status', function ($Model) {
                return view('whycustomerstrustus::layouts.status', ['Model' => $Model]);
            })
            ->addColumn('image', function ($Model) {
                return view('whycustomerstrustus::layouts.image', ['Model' => $Model]);
            })
            ->editColumn('created_at', function ($Model) {
                return $Model->created_at->format('F j, Y, g:i a');
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('whycustomerstrustus::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Model = Model::create($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'WhyCustomersTrustUs');
        }

        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('whycustomerstrustus::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::findOrFail($id);

        return view('whycustomerstrustus::edit', compact('Model'));
    }


    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('image')) {
            Upload::deleteImage($Model->image);
            $Model->image = Upload::UploadFile($request->image, 'WhyCustomersTrustUs');
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
