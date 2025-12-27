<?php

namespace Modules\Region\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Country\Entities\Model as Country;
use Modules\Region\Entities\Model;
use Modules\Region\Http\Requests\StoreRequest;
use Modules\Region\Http\Requests\UpdateRequest;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('region::index');
    }

    public function create()
    {
        $Countries = Country::get();

        return view('region::create', compact('Countries'));
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

        return view('region::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Countries = Country::get();

        return view('region::edit', compact('Model', 'Countries'));
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
            ->with('Country')
            ->latest()
            ->when($request->sort_column && $request->sort_direction, function ($query) use ($request) {
                return $query->orderBy($request->sort_column, $request->sort_direction);
            });

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('region::layouts.actions', ['Model' => $Model]);
            })
            ->addColumn('country', function ($Model) {
                return view('region::layouts.country', ['Model' => $Model]);
            })
            ->editColumn('status', function ($Model) {
                return view('region::layouts.status', ['Model' => $Model]);
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
