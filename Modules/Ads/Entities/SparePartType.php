<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;

class SparePartType extends  BaseModel
{
    use Translatable;
    protected $guarded = [];

    protected $table = 'spare_part_types';

    public function spareParts()
    {
        return $this->hasMany(SparePart::class, 'type_id');
    }
}