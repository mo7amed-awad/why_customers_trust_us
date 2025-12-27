<?php

namespace Modules\Brand\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title(),
            'brand_code' => $this->brand_code,
            'phone_code' => $this->phone_code,
            'length' => $this->length,
            'image' => asset($this->image),
        ];

        return $arr;
    }
}
