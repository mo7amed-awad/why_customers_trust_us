<?php

namespace Modules\City\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Region\Entities\Model as Region;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'cities';

    public function Region()
    {
        return $this->belongsTo(Region::class, 'region_id')->withTrashed();
    }
}
