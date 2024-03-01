<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the employee can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('country_create');
    }

    /**
     * Determine whether the employee can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('country_view');
    }

    /**
     * Determine whether the employee can update the question.
     */
    public function update(User $user)
    {
        return $user->can('country_update');
    }

    /**
     * Determine whether the employee can delete the question.
     */
    public function delete(User $user)
    {
        return $user->can('country_delete');
    }
}
