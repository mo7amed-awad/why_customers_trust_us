<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Category\Entities\Subcategory;
use Modules\Category\Entities\Model as Category;

class Model extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'ads';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function images()
    {
        return $this->hasMany(AdImage::class, 'ad_id');
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function sparePart()
    {
        return $this->hasOne(SparePart::class);
    }

    public function plate()
    {
        return $this->hasOne(Plate::class);
    }

    public function accessory()
    {
        return $this->hasOne(Accessory::class);
    }

}