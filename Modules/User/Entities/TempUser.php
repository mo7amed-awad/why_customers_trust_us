<?php

namespace Modules\User\Entities;

use App\Models\BaseModel;

class TempUser extends BaseModel
{
    protected $guarded = [];

    protected $table = 'temp_users';

}