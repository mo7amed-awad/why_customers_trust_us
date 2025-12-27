<?php

namespace App\Traits;

trait Status
{
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeDisActive($query)
    {
        return $query->where('status', 0);
    }
}
