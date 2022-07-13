<?php

namespace App\Domain\User\Handlers;

use App\Domain\User\Contracts\Services\UserServiceInterface;
use App\Models\User;

class UpdateAuthenticatedUserHandler
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function handle(User $user, string $name, string $lastName, string $personalUrl): User
    {
        $this->userService->update($user, [
            'name' => $name,
            'last_name' => $lastName,
            'personal_url' => $personalUrl
        ]);

        return $user;
    }
}