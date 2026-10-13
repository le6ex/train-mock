<?php

namespace App\DTO;

use App\ValueObject\Money;
use Illuminate\Support\Arr;

final readonly class ProductData
{
    public function __construct(
        public string $name,
        public string $description,
        public Money $price,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name'),
            description: $data['description'],
            price: new Money((int) Arr::get($data, 'price'))
        );
    }
}
