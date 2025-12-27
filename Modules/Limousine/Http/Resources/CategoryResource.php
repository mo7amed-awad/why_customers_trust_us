<?php

namespace Modules\Limousine\Http\Resources;

class LimousineResource extends BaseResource
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
