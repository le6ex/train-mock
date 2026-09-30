<?php

namespace App\Enums;

enum PaymentType: string
{
    case card = 'card';
    case sbp = 'sbp';
}
