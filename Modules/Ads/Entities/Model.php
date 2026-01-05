<?php

namespace Modules\Ads\Entities;

use App\Enums\AdTypesEnum;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Subcategory;
use Modules\Category\Entities\Model as Category;

class Model extends  BaseModel
{
    protected $guarded = [];

    protected $table = 'ads';

    protected $casts = [
        'type' => AdTypesEnum::class,
    ];

    protected static function booted()
    {
        static::creating(function ($ad) {
            $year = now()->year;

            $lastId = self::whereYear('created_at', $year)->max('id') + 1;

            $ad->order_number = 'AD-' . $year . '-' . str_pad($lastId, 6, '0', STR_PAD_LEFT);
        });
    }

    public function isFavorited()
    {
        if (!Auth::guard('user')->check()) {
            return false;
        }

        return $this->favorites()->where('user_id', Auth::guard('user')->id())->exists();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'ad_id');
    }

    public function isLiked()
    {
        if (!Auth::guard('user')->check()) {
            return false;
        }

        return $this->likes()->where('user_id', Auth::guard('user')->id())->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'ad_id');
    }

    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at
            ->locale(app()->getLocale())
            ->diffForHumans();
    }


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