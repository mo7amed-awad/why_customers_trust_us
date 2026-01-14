<?php

namespace Modules\User\App\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Entities\Model;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user::index');
    }

    public function datatable(Request $request)
    {
        $query = Model::query()
            ->latest()
            ->when(request()->sort_column && request()->sort_direction, function ($query) {
                return $query->orderBy(request()->sort_column, request()->sort_direction);
            });

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('user::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('name', function ($Model) {
                return view('user::layouts.name', ['Model' => $Model]);
            })
            ->editColumn('status', function ($Model) {
                return view('user::layouts.status', ['Model' => $Model]);
            })
            ->editColumn('image', function ($Model) {
                return view('user::layouts.image', ['Model' => $Model]);
            })
            ->editColumn('phone', function ($Model) {
                return $Model->phone_code.$Model->phone;
            })
            ->editColumn('created_at', function ($Model) {
                if ($Model->created_at) {
                    return $Model->created_at->translatedFormat('F j, Y, g:i a');
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $Model = Model::create(['phone' => str_replace(' ', '', $request->phone)] + $request->only(['name', 'email', 'phone_code', 'country_code']));
        $Model->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Users');
        }
        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('user::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('user::edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['phone' => str_replace(' ', '', $request->phone)] + ['name', 'email', 'phone_code', 'country_code']));
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Users');
        }
        if ($request->password) {
            $Model->password = bcrypt($request->password);
        }
        $Model->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
}
