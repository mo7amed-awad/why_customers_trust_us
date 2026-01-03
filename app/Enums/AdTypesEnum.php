<?php

namespace App\Enums;

enum AdTypesEnum: string
{
    case CAR = 'car';
    case SPARE_PART = 'spare_part';
    case ACCESSORY = 'accessory';
    case LICENSE_PLATE = 'license_plate';
}