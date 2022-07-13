<?php

namespace App\Domain\User\Queries;

use App\Domain\User\Contracts\Services\UserScopeServiceInterface;
use App\Models\User;

class GetAuthenticatedUserQuery
{
    private UserScopeServiceInterface $userScopeService;

    public function __construct(UserScopeServiceInterface $userScopeService)
    {
        $this->userScopeService = $userScopeService;
    }

    public function get(User $user): User
    {
        return $this->userScopeService->restrictUserDataByTokenScope($user);
    }
}