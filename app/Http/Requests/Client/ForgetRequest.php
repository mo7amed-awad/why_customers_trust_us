<?php

namespace App\Http\Requests\Client;

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
            'phone' => ['required', Rule::exists('clients')->where(function ($query) {
                return $query->where('phone', request('phone'))->where('phone_code', request('phone_code'))->whereNull('deleted_at');
            })],
            'phone_code' => ['required'],
        ];
    }
}
