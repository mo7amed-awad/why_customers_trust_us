<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class VerifyRequest extends BaseRequest
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
            'code' => ['required', 'min:6', 'max:6', Rule::exists('admins')->where(function ($query) {
                $query->where('phone', $this->phone)->where('phone_code', $this->phone_code)->where('code', $this->code);
            })],
        ];
    }
}
