<?php

namespace Tests\Feature;

use App\DTO\UserData;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_creates_user(): void
    {
        $user = $this->service()->create(UserData::fromArray([
            'name' => 'Иван',
            'email' => 'IVAN@example.com',
            'password' => 'password123',
        ]));

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('ivan@example.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_service_returns_all_users(): void
    {
        User::factory()->count(2)->create();

        $users = $this->service()->getAll();

        $this->assertCount(2, $users);
        $this->assertInstanceOf(User::class, $users->first());
    }

    public function test_service_updates_user_without_changing_password(): void
    {
        $user = User::factory()->create([
            'password' => 'old-password',
        ]);
        $oldPasswordHash = $user->password;

        $updatedUser = $this->service()->update($user, UserData::fromArray([
            'name' => 'Новое имя',
            'email' => 'new@example.com',
        ]));

        $this->assertSame('Новое имя', $updatedUser->name);
        $this->assertSame('new@example.com', $updatedUser->email);
        $this->assertSame($oldPasswordHash, $updatedUser->password);
    }

    public function test_service_deletes_user(): void
    {
        $user = User::factory()->create();

        $this->service()->delete($user);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    private function service(): UserService
    {
        return app(UserService::class);
    }
}
