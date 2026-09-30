<?php

namespace App\ValueObject;

use InvalidArgumentException;

final readonly class Money
{
    public function __construct(
        private int $kopecks,
    ) {
        if ($kopecks < 0) {
            throw new InvalidArgumentException(
                'Цена не может быть отрицательной.'
            );
        }
    }

    public function kopecks(): int
    {
        return $this->kopecks;
    }
}
