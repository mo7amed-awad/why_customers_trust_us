<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'current_password.required' => __('validation.current_password_required'),
            'current_password.current_password' => __('validation.current_password_incorrect'),
            'new_password.required' => __('validation.new_password_required'),
            'new_password.confirmed' => __('validation.new_password_confirmed'),
        ]);


        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'password-updated');
    }
}
