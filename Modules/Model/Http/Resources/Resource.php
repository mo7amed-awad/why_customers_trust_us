<?php

namespace Modules\Model\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title(),
        ];

        return $arr;
    }
}
