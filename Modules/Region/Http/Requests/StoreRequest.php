<?php

namespace Modules\Region\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
        ];
    }
}
