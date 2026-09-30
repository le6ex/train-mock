<?php

namespace App\DTO;

use App\ValueObject\Money;

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
            name: $data['name'],
            description: $data['description'],
            price: new Money((int) $data['price']),
        );
    }
}
