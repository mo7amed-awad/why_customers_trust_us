<?php

namespace App\Traits;

trait Translatable
{

    public function trans($field)
    {
        $locale = app()->getLocale();
        return $this->{$field . '_' . $locale} ?? $this->{$field . '_en'};
    }


}