<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class ResetRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ];
    }
}
