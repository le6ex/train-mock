<?php

namespace App\Models;

use App\Enums\PaymentBank;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected function casts(): array
    {
        return 
        [
            'type' => PaymentType::class,
            'bank' => PaymentBank::class,
        ];
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'type_payment_id');
    }
}
