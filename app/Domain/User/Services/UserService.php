<?php

namespace App\Domain\User\Services;

use App\Domain\User\Contracts\Services\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function create(array $attributes): User
    {
        if (isset($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        }

        $user = User::create($attributes);

        return $user;
    }

    public function update(User $user, array $attributes): User
    {
        $user->update($attributes);
        return $user;
    }

    // public function assignRole(User $user, ...$roles): User
    // {
    //     return $user->assignRole(...$roles);
    // }

    // public function addPicture(User $user, File $picture): User
    // {
    //     $user->picture_id = $picture->id;
    //     $user->save();

    //     return $user;
    // }

    // public function createWithoutPassword(array $attributes): User
    // {
    //     $attributes['password'] = $this->generateStrongPassword($attributes);
    //     return $this->create($attributes);
    // }

    // private function generateStrongPassword($toBeHashed = null): string
    // {
    //     $toBeHashed = is_array($toBeHashed) ? json_encode($toBeHashed) : $toBeHashed;
    //     return Hash::make(Hash::make(rand(0, PHP_INT_MAX) - rand(0, PHP_INT_MAX)) . Hash::make(is_string($toBeHashed) ? $toBeHashed : $toBeHashed->__toString() ?? rand(0, PHP_INT_MAX)));
    // }
}
