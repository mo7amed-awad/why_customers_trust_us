<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25',
            'email' => 'required|email|unique:users,email|max:30',
            'phone' => 'required|string|unique:users,phone|max:10',
            'password' => 'required|string|min:8|confirmed',
            'agree' => 'accepted',
        ];
    }
}
