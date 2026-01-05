<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Ads\Entities\Model as Ad;
use Modules\User\Entities\Model as User;

class Comment extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'comments';

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at
            ->locale(app()->getLocale())
            ->diffForHumans();
    }

}