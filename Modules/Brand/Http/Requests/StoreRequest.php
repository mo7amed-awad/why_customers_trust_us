<?php

namespace Modules\Brand\Http\Requests;

use App\Functions\Upload;
use App\Http\Requests\API\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        // Handle image upload
        if ($this->hasFile('image')) {
            $data['image'] = Upload::UploadFile($this->file('image'), 'Brands');
        }

        return $data;
    }
}
