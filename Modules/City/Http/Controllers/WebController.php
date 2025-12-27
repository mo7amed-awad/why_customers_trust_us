<?php

namespace Modules\City\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\City\Entities\Model;
use Modules\City\Http\Requests\StoreRequest;
use Modules\City\Http\Requests\UpdateRequest;
use Modules\Region\Entities\Model as Region;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('city::index');
    }

    public function create()
    {
        $Regions = Region::get();

        return view('city::create', compact('Regions'));
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

        return view('city::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Regions = Region::get();

        return view('city::edit', compact('Model', 'Regions'));
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
            ->with('Region')
            ->latest()
            ->when($request->sort_column && $request->sort_direction, function ($query) use ($request) {
                return $query->orderBy($request->sort_column, $request->sort_direction);
            });

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('city::layouts.actions', ['Model' => $Model]);
            })
            ->addColumn('region', function ($Model) {
                return view('city::layouts.region', ['Model' => $Model]);
            })
            ->editColumn('status', function ($Model) {
                return view('city::layouts.status', ['Model' => $Model]);
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
