<?php

namespace Modules\Admin\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Model;
use Modules\Admin\Entities\Permission;
use Yajra\DataTables\DataTables;

class Controller extends BasicController
{
    public function index(Request $request)
    {
        return view('admin::index');
    }

    public function datatable(Request $request)
    {
        $query = Model::query()
            ->when(request()->sort_column && request()->sort_direction, function ($query) {
                return $query->orderBy(request()->sort_column, request()->sort_direction);
            });

        $actions_counter = 1;
        $status_counter = 1;

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) use (&$actions_counter) {
                if ($actions_counter > 1) {
                    return view('admin::layouts.actions', ['Model' => $Model]);
                }
                $actions_counter++;
            })
            ->editColumn('status', function ($Model) use (&$status_counter) {
                if ($status_counter > 1) {
                    return view('admin::layouts.status', ['Model' => $Model]);
                }
                $status_counter++;
            })
            ->editColumn('image', function ($Model) {
                return view('admin::layouts.image', ['Model' => $Model]);
            })
            ->editColumn('phone', function ($Model) {
                return $Model->phone_code.$Model->phone;
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

    public function create()
    {
        $Permissions = Permission::query()
            ->get()
            ->groupBy('type');

        return view('admin::create', compact('Permissions'));
    }

    public function store(Request $request)
    {
        $Model = Model::create(['phone' => str_replace(' ', '', $request->phone)] + $request->except(['image', 'password', 'password_confirmation', 'permissions']));
        $Model->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Admins');
        }
        $Model->save();

        $Model->Permissions()->sync($request->permissions);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->route(activeGuard().'.admins.index');
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('admin::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        $Permissions = Permission::query()
            ->get()
            ->groupBy('type');

        return view('admin::edit', compact('Model', 'Permissions'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update(['phone' => str_replace(' ', '', $request->phone)] + $request->except(['image', 'password', 'password_confirmation', 'permissions']));
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Admins');
        }
        if ($request->password) {
            $Model->password = bcrypt($request->password);
        }
        $Model->save();

        $Model->Permissions()->sync($request->permissions);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->route(activeGuard().'.admins.index');
    }

    public function destroy($id)
    {
        if (Model::count()) {
            Model::where('id', $id)->delete();
        }
    }
}
