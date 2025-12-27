<?php

namespace Modules\City\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'region_id' => ['required', 'numeric', 'exists:regions,id'],
        ];
    }
}
