<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Modules\Country\Entities\Model as Country;
use Modules\AccountType\Entities\Model as AccountType;

use Modules\Order\App\Models\Order;
use Modules\Order\App\Models\OrderNotification;
use Modules\Order\App\Models\OrderOffer;
use Modules\ServiceType\Entities\Model as ServiceType;
use Modules\User\App\Models\UserLocation;
use Modules\WinchTransportType\Entities\Model as WinchTransportType;
use Modules\WinchType\Entities\Model as WinchType;

use Modules\FurnitureVehicleType\Entities\Model as FurnitureVehicleType;
use Modules\FurnitureTransportType\Entities\Model as FurnitureTransportType;
use Modules\FurnitureService\Entities\Model as FurnitureService;

use Modules\DeliveryVehicleType\Entities\Model as DeliveryVehicleType;

class Model extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $guarded = [];
    protected $table = 'users';

    /*
    |--------------------------------------------------------------------------
    | Basic Relations
    |--------------------------------------------------------------------------
    */

    public function Country()
    {
        return $this->belongsTo(Country::class, 'phone_code', 'phone_code');
    }

    public function Type()
    {
        return $this->belongsTo(AccountType::class, 'type_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Service Type Relations (service_type_id)
    |--------------------------------------------------------------------------
    */

    public function ServiceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Winch Relations (service_type = 1)
    |--------------------------------------------------------------------------
    */

    public function WinchTransportType()
    {
        return $this->belongsTo(WinchTransportType::class, 'winch_transport_type_id');
    }

    public function WinchType()
    {
        return $this->belongsTo(WinchType::class, 'winch_type_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Furniture Relations (service_type = 2)
    |--------------------------------------------------------------------------
    */

    public function FurnitureVehicleType()
    {
        return $this->belongsTo(FurnitureVehicleType::class, 'furniture_vehicle_type_id');
    }

    public function FurnitureTransportType()
    {
        return $this->belongsTo(FurnitureTransportType::class, 'furniture_transport_type_id');
    }

    // PIVOT MANY-TO-MANY → user_furniture_service
    public function FurnitureServices()
    {
        return $this->belongsToMany(FurnitureService::class,'user_furniture_service','user_id','furniture_service_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Delivery Relations (service_type = 3)
    |--------------------------------------------------------------------------
    */

    public function DeliveryVehicleType()
    {
        return $this->belongsTo(DeliveryVehicleType::class, 'delivery_vehicle_type_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Device Tokens (One to Many)
    |--------------------------------------------------------------------------
    */

    public function DeviceTokens()
    {
        return $this->hasMany(DeviceToken::class, 'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'user_id');
    }

    public function location()
    {
        return $this->hasOne(UserLocation::class, 'user_id');
    }

    public function setAvailability(bool $status): void
    {
        $this->location()->updateOrCreate(
            ['user_id' => $this->id],
            ['is_available' => $status]
        );
    }

    public function isAvailable(): bool
    {
        return (bool) optional($this->location)->is_available;
    }

    public function notifiedOrders()
    {
        return $this->hasManyThrough(
            Order::class,
            OrderNotification::class,
            'driver_id',
            'id',
            'id',
            'order_id'
        );
    }

    public function offers(){
        return $this->hasMany(OrderOffer::class, 'driver_id');
    }
}
