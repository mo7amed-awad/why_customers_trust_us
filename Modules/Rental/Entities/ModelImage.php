<?php

namespace Modules\Rental\Entities;

use App\Models\BaseModel;

class ModelImage extends BaseModel
{
    protected $guarded = [];

    protected $table = 'rental_images';

    public function Rental()
    {
        return $this->belongsTo(Model::class, 'rental_id');
    }
}
