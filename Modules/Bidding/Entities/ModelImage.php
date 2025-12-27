<?php

namespace Modules\Bidding\Entities;

use App\Models\BaseModel;

class ModelImage extends BaseModel
{
    protected $guarded = [];

    protected $table = 'bidding_images';

    public function Bidding()
    {
        return $this->belongsTo(Model::class, 'bidding_id');
    }
}
