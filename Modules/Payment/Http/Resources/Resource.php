<?php

namespace Modules\Payment\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title(),
            'desc' => $this->desc(),
            'image' => asset($this->image),
        ];

        return $arr;
    }
}
