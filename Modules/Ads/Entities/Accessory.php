<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Ads\Entities\Model as Ad;

class Accessory extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'accessories';

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}