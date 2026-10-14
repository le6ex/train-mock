<?php

namespace App\DTO;

use Illuminate\Support\Arr;

final readonly class UserData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name'),
            email: strtolower(Arr::get($data,'name')),
            password: Arr::get($data, 'name'));
    }
}
