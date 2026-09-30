<?php

namespace App\DTO;

final readonly class UserData
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $password = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            strtolower($data['email']),
            $data['password'] ?? null);
    }
}
