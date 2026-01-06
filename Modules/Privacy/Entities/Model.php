<?php

namespace Modules\Privacy\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use Translatable, SoftDeletes;

    protected $guarded = [];

    protected $table = 'privacy';
}
