<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case not_paid = 'not_paid';
    case process = 'process';
    case refund = 'refund';
    case success = 'success';
}
