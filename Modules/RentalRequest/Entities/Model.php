<?php

namespace Modules\RentalRequest\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Rental\Entities\Model as Rental;
use Modules\Payment\Entities\Model as Payment;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'rental_requests';

    public function Rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id')->withTrashed();
    }

    public function Payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id')->withTrashed();
    }
}
