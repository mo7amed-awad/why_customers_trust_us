<?php

namespace Modules\BidRequest\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'bid' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            'country_code' => ['required', 'string'],
            'bidding_id' => ['required', 'numeric', 'exists:biddings,id'],
        ];
    }
}
