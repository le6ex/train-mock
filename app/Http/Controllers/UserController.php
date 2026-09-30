<?php

namespace App\Http\Controllers;

use App\DTO\UserData;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        private UserService $users
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->users->getAll());
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        return response()->json($this->users->create(UserData::fromArray($request->validated())), 201);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        return response()->json($this->users->update($user, UserData::fromArray($request->validated())));
    }

    public function destroy(User $user): Response
    {
        $this->users->delete($user);

        return response()->noContent();
    }
}
