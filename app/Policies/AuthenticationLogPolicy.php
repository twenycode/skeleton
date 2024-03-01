<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthenticationLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the employee can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('authentication-log_view');
    }


}
