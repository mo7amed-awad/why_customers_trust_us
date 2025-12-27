<?php

namespace App\Traits;

trait OrderBy
{
    public function scopeOrderByArrangement($query)
    {
        return $query->orderBy('arrangement');
    }
}
