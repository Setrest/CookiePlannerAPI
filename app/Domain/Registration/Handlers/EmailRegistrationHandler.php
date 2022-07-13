<?php

namespace App\Domain\Registration\Handlers;

use App\Domain\User\Contracts\Services\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmailRegistrationHandler
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function handle(string $email, string $password): User
    {
        $user = DB::transaction(function () use ($email, $password) {
            return $this->userService->create([
                'email' => $email,
                'password' => $password,
                'nickname' => $email
            ]);
        }, 2);

        // $user->sendEmailVerificationNotification();

        return $user;
    }
}
