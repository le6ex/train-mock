<?php

namespace App\Services;

use App\DTO\UserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UserService
{
    public function getAll(): Collection
    {
        return User::query()->get();
    }

    public function create(UserData $data): User
    {
        return User::create(['name' => $data->name, 'email' => $data->email, 'password' => $data->password]);
    }

    public function update(User $user, UserData $data): User
    {
        $attributes = ['name' => $data->name, 'email' => $data->email];
        if ($data->password !== null) {
            $attributes['password'] = $data->password;
        }
        $user->update($attributes);

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
