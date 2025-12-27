<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseRequest
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
            'name' => ['required'],
            'email' => ['nullable'],
            'phone' => ['required', Rule::unique('clients')->where(function ($query) {
                return $query->where('phone', request('phone'))->where('phone_code', request('phone_code'))->whereNull('deleted_at');
            })],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
            'phone_code' => ['required'],
        ];
    }
}
