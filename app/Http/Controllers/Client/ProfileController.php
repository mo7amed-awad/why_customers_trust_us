<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $user = auth('user')->user();

        return view('Client.profile', compact('user'));
    }

    public function update(Request $request)
    {
        \Log::info($request->all());
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

}
