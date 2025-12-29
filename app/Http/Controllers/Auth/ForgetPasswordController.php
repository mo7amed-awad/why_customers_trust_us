<?php

namespace App\Http\Controllers\Auth;

use App\Functions\WhatsApp;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\User\Entities\Model as User;

class ForgetPasswordController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }


    public function otp(ForgetPasswordRequest $request){

        $country_code = '+'.$request->country_code;
        $phone = $country_code.$request->phone;

        $user = User::where('phone', $request->phone)
            ->where('phone_code', $country_code)
            ->first();

        if (!$user) {
            return back()->withErrors(['phone' => __('front.user_not_found')]);
        }

        $otp = WhatsApp::SendOTP($phone);

        \Log::info($otp);
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
}
