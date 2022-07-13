<?php

namespace App\Domain\Registration\Handlers;

use App\Domain\Registration\Contracts\VerifyServiceInterface;
use App\Models\User;
use Exception;

class EmailVerifyHandler
{
    /**
     * @var \App\Services\Interfaces\VerifyServiceInterface
     */
    private $verifyService;

    public function __construct(VerifyServiceInterface $verifyService)
    {
        $this->verifyService = $verifyService;
    }

    public function handle(int $userId, string $hash): User
    {
        $user = User::find($userId);

        if (!$user) {
            throw new Exception('Not valid hash!', 400);
        }

        $isValidHash = $this->verifyService->checkEmailHash($user, $hash);

        if (!$isValidHash) {
            throw new Exception('Not valid hash!', 400);
        }

        return $this->verifyService->verifyEmail($user);
    }
}