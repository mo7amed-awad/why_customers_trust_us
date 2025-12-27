<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ForgetRequest extends BaseRequest
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
            'phone' => ['required', 'min:8', Rule::exists('admins')->where(function ($query) {
                $query->where('phone', $this->phone)->where('phone_code', $this->phone_code);
            })],
        ];
    }
}
