<?php

namespace App\Enums;

enum FriendStatus: string
{
    case pending = 'pending';
    case accepted = 'accepted';
    case rejected = 'rejected';
    case blocked = 'blocked';
}
