<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Ads\Entities\Model as Ad;

class Plate extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'plates';

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}