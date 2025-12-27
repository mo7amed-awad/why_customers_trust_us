<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'phone' => str_replace(' ', '', $this->phone),
        ]);
    }

    public function rules(): array
    {
        return [
            'phone' => ['required', 'numeric', 'min:10', 'unique:admins,phone,'.auth()->id().',id'],
            'name' => ['required', 'string', 'min:3'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ];
    }
}
