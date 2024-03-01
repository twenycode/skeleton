<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityLogPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the employee can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('activity-log_view');
    }


}
