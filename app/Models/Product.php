<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function orderItems(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_item', 'product_id', 'order_id');

    }
}
