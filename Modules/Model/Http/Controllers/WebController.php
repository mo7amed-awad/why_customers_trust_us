<?php

namespace Modules\Model\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Model as Brand;
use Modules\Model\Entities\Model;
use Modules\Model\Http\Requests\StoreRequest;
use Modules\Model\Http\Requests\UpdateRequest;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('model::index');
    }

    public function create()
    {
        $Brands = Brand::get();

        return view('model::create', compact('Brands'));
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

        return view('model::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Brands = Brand::get();

        return view('model::edit', compact('Model', 'Brands'));
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
            ->with('Brand')
            ->latest()
            ->when($request->sort_column && $request->sort_direction, function ($query) use ($request) {
                return $query->orderBy($request->sort_column, $request->sort_direction);
            });

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('model::layouts.actions', ['Model' => $Model]);
            })
            ->addColumn('brand', function ($Model) {
                return view('model::layouts.brand', ['Model' => $Model]);
            })
            ->editColumn('status', function ($Model) {
                return view('model::layouts.status', ['Model' => $Model]);
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
