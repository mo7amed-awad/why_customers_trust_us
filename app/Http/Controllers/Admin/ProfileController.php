<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Model;

class ProfileController extends BasicController
{
    public function show()
    {
        return view('Admin.profile');
    }

    public function update(ProfileRequest $request)
    {
        Model::where('id', auth()->id())->update($request->except('name', 'phone', 'email', 'password', '_token', '_method', 'password_confirmation'));

        if ($request->password) {
            Model::where('id', auth()->id())->update([
                'password' => Hash::make($request->password),
            ]);
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }
}
