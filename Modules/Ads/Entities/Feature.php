<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;

class Feature extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'features';

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_features');
    }
}