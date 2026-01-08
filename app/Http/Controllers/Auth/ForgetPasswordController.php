<?php

namespace App\Http\Controllers\Auth;

use App\Functions\WhatsApp;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Mail\SendOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Modules\User\Entities\Model as User;

class ForgetPasswordController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }


    public function otp(ForgetPasswordRequest $request){

        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors(['phone' => __('front.user_not_found')]);
        }

        $otp = rand(100000, 999999);

        Mail::to($user->email)->send(new SendOTP($otp));

        return view('auth.forget-password-otp', [
            'user_id' => $user->id,
            'otp' => $otp,
        ]);
    }

    public function createNewPassword(Request $request){

        return view('auth.new-password',[
            'user_id' => $request->user_id,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', __('front.password_changed_success'));
    }
}
