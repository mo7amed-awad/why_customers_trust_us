<?php

namespace Modules\Ads\Entities;

use App\Models\BaseModel;
use Modules\Brand\Entities\Model as Brand;
use Modules\Model\Entities\Model as CarModel;
use Modules\Ads\Entities\Model as Ad;
class SparePart extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'spare_part';

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function type()
    {
        return $this->belongsTo(SparePartType::class);
    }
}