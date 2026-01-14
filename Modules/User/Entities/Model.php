<?php

namespace Modules\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Ads\Entities\Model as Ad;
use Modules\Notification\Entities\Model as Notification;


class Model extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = [];
    protected $table = 'users';



    public function favorites()
    {
        return $this->belongsToMany(Ad::class, 'favorites', 'user_id', 'ad_id')
            ->withTimestamps();
    }

    public function favoriteAds()
    {
        return $this->belongsToMany(Ad::class, 'favorites');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

}
