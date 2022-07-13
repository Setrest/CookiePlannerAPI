<?php

namespace App\Domain\Registration\Services;

use App\Domain\Registration\Contracts\VerifyServiceInterface;
use App\Models\User;

class VerifyService implements VerifyServiceInterface
{
    public function verifyEmail(User $user): User
    {
        $user->markEmailAsVerified();
        return $user;
    }

    public function checkEmailHash(User $user, string $hash): bool
    {
        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return false;
        }

        return true;
    }
}
