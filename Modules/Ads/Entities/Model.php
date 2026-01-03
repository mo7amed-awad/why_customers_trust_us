<?php

namespace Modules\Ads\Entities;

use App\Enums\AdTypesEnum;
use App\Models\BaseModel;
use Modules\Category\Entities\Subcategory;
use Modules\Category\Entities\Model as Category;

class Model extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'ads';

    protected $casts = [
        'type' => AdTypesEnum::class,
    ];
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

    public function carDetails()
    {
        return $this->hasOne(Car::class, 'ad_id','id');
    }

    public function sparePartDetails()
    {
        return $this->hasOne(SparePart::class, 'ad_id','id');
    }

    public function plateDetails()
    {
        return $this->hasOne(Plate::class, 'ad_id','id');
    }

    public function accessoryDetails()
    {
        return $this->hasOne(Accessory::class, 'ad_id','id');
    }

}