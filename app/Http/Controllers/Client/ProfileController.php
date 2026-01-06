<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $user = auth('user')->user();
        $favorites = $user->favorites;
        return view('Client.profile', compact('user', 'favorites'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'sometimes|nullable|string|max:255',
            'phone' => 'sometimes|nullable|string|max:20',
            'email' => 'sometimes|nullable|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        $user->save();

        return response()->json(['success' => true]);
    }

    public function deleteAccount(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|string',
            ], [
                'password.required' => __('front.password_required'),
            ]);

            $user = Auth::guard('user')->user();

            if (!Hash::check($request->password, $user->password)) {
                $message = __('front.password_incorrect');

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message
                    ], 422);
                }

                return back()->withErrors([
                    'password' => $message
                ])->with('error',$message);
            }

            DB::beginTransaction();

            try {

                Auth::guard('user')->logout();

                $user->delete();

                DB::commit();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'تم حذف حسابك بنجاح',
                        'redirect' => url('/')
                    ]);
                }

                return redirect('/')->with('success', 'تم حذف حسابك بنجاح');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } catch (\Exception $e) {

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'حدث خطأ أثناء حذف الحساب. يرجى المحاولة لاحقاً'
                ], 500);
            }

            return back()->with('error', 'حدث خطأ أثناء حذف الحساب. يرجى المحاولة لاحقاً');
        }
    }
}
