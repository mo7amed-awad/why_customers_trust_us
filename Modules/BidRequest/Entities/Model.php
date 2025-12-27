<?php

namespace Modules\BidRequest\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Bidding\Entities\Model as Bidding;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'bid_requests';

    public function Bidding()
    {
        return $this->belongsTo(Bidding::class, 'bidding_id')->withTrashed();
    }
}
