<?php

namespace Modules\Bidding\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Brand\Entities\Model as Brand;
use Modules\Specification\Entities\Model as Specification;
use Modules\BidRequest\Entities\Model as BidRequest;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'biddings';

    public function Specifications()
    {
        return $this->belongsToMany(Specification::class, 'bidding_specification', 'bidding_id', 'specification_id', 'id')->withPivot('title_ar', 'title_en');
    }

    public function Images()
    {
        return $this->hasMany(ModelImage::class, 'bidding_id', 'id')->orderBy('arrangement');
    }

    public function Requests()
    {
        return $this->hasMany(BidRequest::class, 'bidding_id', 'id');
    }

    public function Image()
    {
        return $this->hasOne(ModelImage::class, 'bidding_id', 'id')->orderBy('arrangement');
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
