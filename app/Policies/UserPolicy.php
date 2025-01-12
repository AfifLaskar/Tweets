<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function edit(User $loggedUser, User $user)
    {
        // dd($loggedUser, $user);
        // return $loggedUser->is($user);
        return $loggedUser->id === $user->id;
    }
}
