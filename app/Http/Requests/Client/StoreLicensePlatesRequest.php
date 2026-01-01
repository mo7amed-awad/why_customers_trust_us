<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicensePlatesRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'digit_count' => 'required|in:1,2,3,4,5,6',
            'usage_type' => 'required|in:private,commercial,government,diplomatic,antique',
        ];
    }
}
