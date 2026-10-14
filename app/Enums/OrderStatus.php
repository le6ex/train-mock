<?php

namespace App\Enums;

enum OrderStatus: string
{
    case pending = 'pending';
    case accepted = 'accepted';
    case rejected = 'rejected';
    case blocked = 'blocked';
}
