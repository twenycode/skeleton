<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\PermissionCreateRequest;
use App\Http\Requests\Auth\PermissionUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Exception;

class PermissionController extends BaseController
{
    protected $index_view = 'auth.permissions.index';  // Variable to blade index file location
    protected $create_view =  'auth.permissions.create'; // Variable to blade create file location
    protected $edit_view =  'auth.permissions.edit';   // Variable to blade edit file location
    protected $show_view;   // Variable to blade show file location
    protected $resource = 'permission';    // Get a single resource from the database
    protected $resources = 'permissions';   // Get a collection of resources from the database
    protected $route = 'admin.permissions.index';   // Route to redirect after particular action
    protected $model_relation = ['role'];


    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    // Get list of resources
    public function index()
    {
        return $this->relationshipModel();
    }

    // store new resource
    public function store(PermissionCreateRequest $request)
    {
        $this->canCreate();
        try {
            $permission = $this->model->create($request->validated());
            isset($request['roles']) && $this->assignRoles($request['roles'], $permission); //Check if permission request has data
            return $this->successRoute($this->route,'Permission added');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    // update existing resource
    public function update(PermissionUpdateRequest $request,$id)
    {
        $this->canUpdate();
        try {
            $permission =  $this->model->find($this->decode($id));
            $permission->update($request->validated());
            isset($request['roles']) ? $this->updateRoles($permission,$request['roles']) : $this->removeRoles($permission);
            return $this->successRoute($this->route,'Permission updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /* Assign Permissions To roles */
    private function assignRoles($roles,$permission) : void
    {
        //If one or more role is selected
        foreach ($roles as $role) {
            $r = Role::find($role); //Match input role to db record
            $r->givePermissionTo($permission);
        }
    }

    /* Update Permission to Roles */
    private function updateRoles($permission, $roles) :void
    {
        $permission->roles()->sync($roles);
    }

    /* Remove all roles from permission */
    private function removeRoles($permission) : void
    {
        $permission->roles()->detach();
    }

}
