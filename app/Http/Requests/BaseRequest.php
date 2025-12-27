<?php

namespace App\Http\Requests;

use App\Functions\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function failedValidation($validator)
    {
        if (str_contains(url()->full(), '/api')) {
            return ResponseHelper::make(null, $validator->errors()->first(), false, 404);
        } else {
            alert()->error($validator->errors()->first());

            return redirect()->back();
        }
    }
}
