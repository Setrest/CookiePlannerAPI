<?php

namespace App\Domain\User\Repositories;

use App\Infrastructure\Repositories\EloquentRepository;
use App\Models\User;
use Exception;

class UserRepository extends EloquentRepository
{
    public function find(int $id): User
    {
        $user = User::find($id);

        if (!$user) {
            throw new Exception('User not found', 404);
        }

        return $user;
    }
}
