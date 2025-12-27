<?php

namespace Modules\Brand\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Model;
use Modules\Brand\Http\Requests\StoreRequest;
use Modules\Brand\Http\Requests\UpdateRequest;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {

        return view('brand::index');
    }

    public function create()
    {

        return view('brand::create');
    }

    public function store(StoreRequest $request)
    {
        Model::create($request->validated());

        toast(__('trans.addedSuccessfully'), 'success');

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('brand::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('brand::edit', compact('Model'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Model::where('id', $id)->update($request->validated());

        toast(__('trans.updatedSuccessfully'), 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }

    public function datatable(Request $request)
    {
        $query = Model::query()
            ->latest()
            ->when($request->sort_column && $request->sort_direction, function ($query) use ($request) {
                return $query->orderBy($request->sort_column, $request->sort_direction);
            });

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('brand::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('status', function ($Model) {
                return view('brand::layouts.status', ['Model' => $Model]);
            })
            ->editColumn('image', function ($Model) {
                return view('brand::layouts.image', ['Model' => $Model]);
            })
            ->editColumn('created_at', function ($Model) {
                if ($Model->created_at) {
                    return $Model->created_at->format('F j, Y, g:i a');
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }
}
