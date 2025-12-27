<?php

namespace Modules\User\Entities;

class DeviceToken extends \App\Models\BaseModel
{
    protected $guarded = [];

    protected $table = 'user_device_tokens';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
