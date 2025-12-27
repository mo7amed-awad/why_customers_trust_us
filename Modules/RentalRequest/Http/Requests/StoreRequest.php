<?php

namespace Modules\RentalRequest\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'sub_total' => ['required', 'numeric'],
            'vat' => ['required', 'numeric'],
            'net_total' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            'country_code' => ['required', 'string'],
            'rental_id' => ['required', 'numeric', 'exists:rentals,id'],
            'payment_id' => ['required', 'numeric', 'exists:payments,id'],
        ];
    }
}
