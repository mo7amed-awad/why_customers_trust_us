<?php

namespace Modules\WhyChooseUs\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use  Translatable;

    protected $guarded = [];

    protected $table = 'why_choose_us';
}
