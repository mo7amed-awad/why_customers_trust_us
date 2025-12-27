<?php

namespace Modules\FAQ\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'faqs';
}
