<?php

namespace Modules\Region\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Country\Entities\Model as Country;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'regions';

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }
}
