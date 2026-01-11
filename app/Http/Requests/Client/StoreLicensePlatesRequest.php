<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLicensePlatesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'digit_count' => ['required', Rule::in([1, 2, 3, 4, 5, 6])],

            'usage_type' => [
                'required',
                Rule::in([
                    'public_shared',
                    'public_transport',
                    'taxi',
                    'motorcycle',
                    'tourist_bus',
                    'contracting',
                    'private',
                    'private_passengers',
                    'shared_private',
                    'commercial_transport',
                    'semi_trailer',
                    'antique',
                    'rental',
                    'on_demand_taxi',
                    'public_passengers',
                ]),
            ],
        ];
    }
}
