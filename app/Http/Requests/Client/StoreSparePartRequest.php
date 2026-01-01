<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreSparePartRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'type_id' => 'required|exists:spare_part_types,id',
        ];
    }
}
