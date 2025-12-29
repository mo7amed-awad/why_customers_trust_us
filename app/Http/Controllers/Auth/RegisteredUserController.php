<?php

namespace App\Http\Controllers\Auth;

use App\Functions\WhatsApp;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\User\Entities\TempUser;
use Modules\User\Entities\Model as User;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }

    public function otp(RegisterRequest $request){

        $country_code = '+'.$request->country_code;
        $phone = $country_code.$request->phone;

        $otp = WhatsApp::SendOTP($phone);

        $tempUser = TempUser::updateOrCreate(
            [
                'phone' => $request->phone,
                'phone_code' => $country_code,
            ],
            [
                'name'       => $request->name,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'otp'        => $otp,
            ]
        );

        return view('auth.otp', [
            'temp_user_id' => $tempUser->id,
            'otp' => $otp,
        ]);
    }

    public function reSendOtp(Request $request){

        $request->validate([
            'temp_user_id' => 'required|exists:temp_users,id',
        ]);

        $temp_user = TempUser::find($request->temp_user_id);

        $phone = $temp_user->phone_code.$temp_user->phone;

        $otp = WhatsApp::SendOTP($phone);



        $temp_user->update([
            'otp' => $otp,
        ]);

        return response()->json([
            'success' => true,
            'otp' => $otp
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'temp_user_id' => 'required|exists:temp_users,id',
            'code' => 'required|string|size:6',
        ]);

        $temp_user = TempUser::find($request->temp_user_id);

        if ($temp_user->otp != $request->code) {
            return back()->withErrors(['code' => 'الرمز غير صحيح، حاول مرة أخرى.'])->withInput();
        }


        $user = User::create([
            'name' => $temp_user->name,
            'email' => $temp_user->email,
            'phone' => $temp_user->phone,
            'phone_code' => $temp_user->phone_code,
            'password' => $temp_user->password,
        ]);

        $temp_user->delete();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('client.home');
    }
}
