<?php

namespace Modules\BidRequest\Http\Controllers;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Bidding\Entities\Model as Bidding;
use Modules\BidRequest\Entities\Model;
use Modules\BidRequest\Http\Requests\StoreRequest;
use Modules\BidRequest\Http\Requests\UpdateRequest;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('bid_request::index');
    }

    public function create()
    {
        $Biddings = Bidding::get();

        return view('bid_request::create', compact('Biddings'));
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

        return view('bid_request::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Biddings = Bidding::get();

        return view('bid_request::edit', compact('Model', 'Biddings'));
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
            ->with('Bidding')
            ->latest()
            ->when($request->sort_column && $request->sort_direction, function ($query) use ($request) {
                return $query->orderBy($request->sort_column, $request->sort_direction);
            });

        if ($request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }


        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('bid_request::layouts.actions', ['Model' => $Model]);
            })
            ->addColumn('bidding', function ($Model) {
                return view('bid_request::layouts.bidding', ['Model' => $Model]);
            })
            ->editColumn('phone', function ($Model) {
                return $Model->phone_code . str_replace(' ', '', $Model->phone);
            })
            ->editColumn('created_at', function ($Model) {
                if ($Model->created_at) {
                    return $Model->created_at->format('F j, Y, g:i a');
                }
            })
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }
}
