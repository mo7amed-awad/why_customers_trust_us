<?php

namespace Modules\Bidding\Http\Resources;

class BiddingResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
            'image' => asset($this->Image->select('image')->value('image') ?? setting('logo')),
        ];
    }
}
