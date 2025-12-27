<?php

namespace Modules\Testimonial\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Testimonial\Entities\Model;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('testimonial::index');
    }

    public function datatable(Request $request)
    {
        $query = Model::query();

        if (request()->sort_column && request()->sort_direction) {
            $query->orderBy(request()->sort_column, request()->sort_direction);
        }

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('testimonial::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('title_ar', function ($Model) {
                return view('testimonial::layouts.title_ar', ['Model' => $Model]);
            })
            ->editColumn('title_en', function ($Model) {
                return view('testimonial::layouts.title_en', ['Model' => $Model]);
            })
            ->addColumn('status', function ($Model) {
                return view('testimonial::layouts.status', ['Model' => $Model]);
            })
            ->editColumn('created_at', function ($Model) {
                return $Model->created_at->format('F j, Y, g:i a');
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('testimonial::create');
    }

    public function store(Request $request)
    {
        $Model = Model::create($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));

        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('testimonial::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::findOrFail($id);

        return view('testimonial::edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));

        $Model->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
}
