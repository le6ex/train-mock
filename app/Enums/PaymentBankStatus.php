<?php

namespace App\Enums;

enum PaymentBank: string
{
    case sberbank = 'sberbank';
    case tinkoff = 'tinkoff';
    case other = 'other';
}
