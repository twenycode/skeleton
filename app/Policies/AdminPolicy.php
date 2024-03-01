<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /* Determine whether the employee can create new resource. */
    public function create(Admin $admin)
    {
        return $admin->can('admin_create');
    }

    /* Determine whether the employee can view the resources. */
    public function view(Admin $admin)
    {
        return $admin->can('admin_view');
    }

    /* Determine whether the employee can update the question. */
    public function update(Admin $admin)
    {
        return $admin->can('admin_update');
    }

    /*  Determine whether the employee can delete the question. */
    public function delete(Admin $admin)
    {
        return $admin->can('admin_delete');
    }

}
