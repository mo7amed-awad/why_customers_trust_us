<?php

namespace Modules\Rental\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Brand\Entities\Model as Brand;
use Modules\Specification\Entities\Model as Specification;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'rentals';

    public function Specifications()
    {
        return $this->belongsToMany(Specification::class, 'rental_specification', 'rental_id', 'specification_id', 'id')->withPivot('title_ar', 'title_en');
    }

    public function Images()
    {
        return $this->hasMany(ModelImage::class, 'rental_id', 'id')->orderBy('arrangement');
    }

    public function Image()
    {
        return $this->hasOne(ModelImage::class, 'rental_id', 'id')->orderBy('arrangement');
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function Model()
    {
        return $this->belongsTo(\Modules\Model\Entities\Model::class, 'model_id');
    }
}
