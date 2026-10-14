<?php

namespace Tests\Unit;

use App\ValueObject\EmailAddress;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function test_it_normalizes_email_address(): void
    {
        $email = new EmailAddress('  USER@Example.COM  ');

        $this->assertSame('user@example.com', $email->value());
    }

    public function test_it_rejects_invalid_email_address(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new EmailAddress('not-an-email');
    }
}
