<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use App\Traits\Translatable;

class Feature extends  BaseModel
{
    use Translatable;
    protected $guarded = [];

    protected $table = 'features';

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_features');
    }
}