<?php

namespace Tests\Unit;

use App\ValueObject\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function test_money_returns_kopecks(): void
    {
        $money = new Money(1500);

        $result = $money->kopecks();

        $this->assertSame(1500, $result);
    }

    public function test_money_cannot_be_negative(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Money(-1);
    }
}
