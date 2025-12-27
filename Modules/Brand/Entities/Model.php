<?php

namespace Modules\Brand\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'brands';

    public function Models()
    {
        return $this->hasMany(\Modules\Model\Entities\Model::class, 'brand_id', 'id');
    }
}
