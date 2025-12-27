<?php

namespace Modules\Contact\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $table = 'contacts';

    protected $guarded = [];
}
