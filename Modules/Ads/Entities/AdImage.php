<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Ads\Entities\Model as Ad;

class AdImage extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'ad_images';

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}