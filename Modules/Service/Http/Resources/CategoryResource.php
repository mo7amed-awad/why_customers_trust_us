<?php

namespace Modules\Service\Http\Resources;

class ServiceResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
            'image' => asset($this->image ?? setting('logo')),
        ];
    }
}
