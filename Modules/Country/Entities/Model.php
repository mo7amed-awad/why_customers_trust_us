<?php

namespace Modules\Country\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'countries';
}
