<?php

namespace App\Domain\Registration\Test\Helpers;

use App\Domain\Registration\Contracts\VerifyServiceInterface;
use App\Models\User;

class RegistrationTestHelper
{
    public static function createPhoneVerificationCodeForUser(User $user): int
    {
        return app(VerifyServiceInterface::class)->createPhoneVerificationCode($user)->code;
    }
}