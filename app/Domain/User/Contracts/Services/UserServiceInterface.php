<?php

namespace App\Domain\User\Contracts\Services;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * Create user data
     *
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes): User;

    /**
     * Update user data
     *
     * @param User $user
     * @param array $attributes
     * @return User
     */
    public function update(User $user, array $attributes): User;

    // /**
    //  * Creates a user without the passed password, it will be generated automatically
    //  *
    //  * @param array $attributes
    //  * @return User
    //  */
    // public function createWithoutPassword(array $attributes): User;

    // /**
    //  * Assigne role to user
    //  *
    //  * @param \App\Models\User $user
    //  * @param string|array $roles Role names from Role model
    //  * @return User
    //  */
    // public function assignRole(User $user, ...$roles): User;
}
