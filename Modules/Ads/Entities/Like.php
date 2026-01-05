<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Ads\Entities\Model as Ad;
use Modules\User\Entities\Model as User;

class Like extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'likes';

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}