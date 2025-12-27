<?php

namespace Modules\Testimonial\Http\Resources;

class TestimonialResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
        ];
    }
}
