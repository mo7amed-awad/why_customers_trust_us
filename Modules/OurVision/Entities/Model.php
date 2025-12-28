<?php

namespace Modules\OurVision\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes, Translatable;

    protected $guarded = [];

    protected $table = 'our_vision';
}
