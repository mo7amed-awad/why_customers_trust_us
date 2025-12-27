<?php

namespace Modules\WhoWeAre\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use  Translatable;

    protected $guarded = [];

    protected $table = 'who_we_are';
}
