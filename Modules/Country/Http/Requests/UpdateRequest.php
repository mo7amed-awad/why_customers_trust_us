<?php

namespace Modules\Country\Http\Requests;

use App\Functions\Upload;
use App\Http\Requests\API\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'currancy_code_ar' => ['required', 'string'],
            'currancy_code_en' => ['required', 'string'],
            'currancy_value' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            'country_code' => ['required', 'string'],
            'length' => ['required', 'numeric', 'min:1', 'max:10'],
            'decimals' => ['required', 'numeric', 'min:1', 'max:3'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        // Handle image upload
        if ($this->hasFile('image')) {
            $data['image'] = Upload::UploadFile($this->file('image'), 'Countries');
        }

        return $data;
    }
}
