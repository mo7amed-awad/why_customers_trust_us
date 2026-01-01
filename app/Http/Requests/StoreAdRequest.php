<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:70',
            'description' => 'required|string',
            'address' => 'required|string|max:70',
            'price' => 'required|numeric',
            'negotiable' => 'nullable|boolean',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',
            'country_code' => 'nullable|string|max:10',
            'is_new' => 'nullable|boolean',
            'images' => 'nullable|array|min:1|max:7',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
