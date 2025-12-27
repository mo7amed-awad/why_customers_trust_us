<?php

namespace Modules\Country\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title(),
            'country_code' => $this->country_code,
            'phone_code' => $this->phone_code,
            'length' => $this->length,
            'image' => asset($this->image),
        ];

        return $arr;
    }
}
