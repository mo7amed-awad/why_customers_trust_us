<?php

namespace Modules\Model\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Brand\Entities\Model as Brand;

class Model extends BaseModel
{
    use Translatable, SoftDeletes;

    protected $guarded = [];

    protected $table = 'models';

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
}
