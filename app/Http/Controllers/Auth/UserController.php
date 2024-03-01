<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\UserCreateRequest;
use App\Http\Requests\Auth\UserUpdateRequest;
use App\Models\User;
use App\Services\Auth\PublicUserService;
use App\Services\Auth\UserService;

class UserController extends BaseController
{
    private $service;
    protected $index_view = 'auth.users.index';  // Variable to blade index file location
    protected $create_view =  'auth.users.create'; // Variable to blade create file location
    protected $edit_view =  'auth.users.edit';   // Variable to blade edit file location
    protected $show_view;   // Variable to blade show file location
    protected $resource = 'user';    // Get a single resource from the database
    protected $resources = 'users';   // Get a collection of resources from the database
    protected $route = 'admin.users.index';   // Route to redirect after particular action
    protected $model_relation = ['role','latestAuthentication'];

    public function __construct(User $user, UserService $userService)
    {
        parent::__construct($user);
        $this->service = $userService;
    }

    //  Index class
    public function index()
    {
        $this->canView();
        try {
            ${$this->resources} = $this->model
                ->where('user_type','public')
                ->with($this->model_relation)
                ->orderBy('created_at','desc')
                ->get();
            return view($this->index_view,compact($this->resources));
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // store new resource
    public function store(UserCreateRequest $request)
    {
        $this->canCreate();
        try {
            $this->service->saving($request->validated(),$this->model);
            return $this->successRoute($this->route,'User account created');
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // update existing resource
    public function update(UserUpdateRequest $request, $id)
    {
        $this->canUpdate();
        try {
            $this->service->editing($request->validated(),$this->model->find($this->decode($id)));
            return $this->successRoute($this->route,'Updated Successfully');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request->validated(),$e->getMessage());
        }
    }


}
