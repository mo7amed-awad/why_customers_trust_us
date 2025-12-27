<?php

namespace Modules\Specification\Http\Resources;

class SpecificationResource extends BaseResource
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
