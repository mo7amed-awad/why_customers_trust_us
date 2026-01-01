<?php

namespace Modules\Brand\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use Translatable, SoftDeletes;

    protected $guarded = [];

    protected $table = 'brands';

    public function Models()
    {
        return $this->hasMany(\Modules\Model\Entities\Model::class, 'brand_id', 'id');
    }
}
