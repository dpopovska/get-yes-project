<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserRoles
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Check if the user rolja is Admin
     * @param  \App\User
     * @return boolean
     */
    public function isAdmin($user)
    {
        return $user->checkIfUserIs('admin');
    }
}
