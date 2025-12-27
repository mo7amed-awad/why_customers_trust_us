<?php

namespace Modules\Admin\Entities;

use App\Traits\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Model extends Authenticatable
{
    use HasApiTokens, Notifiable, Status;

    protected $guarded = [];

    protected $table = 'admins';

    protected $hidden = ['password', 'remember_token'];

    protected $with = ['Permissions'];

    public function Permissions()
    {
        return $this->belongsToMany(Permission::class, 'admin_permission', 'admin_id', 'permission_id');
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->uuid = Str::uuid()->toString();
            $model->save();
        });
    }
}
