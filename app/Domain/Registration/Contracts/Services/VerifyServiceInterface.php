<?php

namespace App\Domain\Registration\Contracts;

use App\Models\PhoneVerificationCode;
use App\Models\User;

interface VerifyServiceInterface
{
    /**
     * Verify the user's email
     *
     * @param User $user
     * @return User
     */
    public function verifyEmail(User $user): User;

    /**
     * Check hash from email
     *
     * @param User $user
     * @param string $hash
     * @return boolean
     */
    public function checkEmailHash(User $user, string $hash): bool;
}
