<?php

namespace App\Services\Auth;

use App\Jobs\User\AccountCreatedJob;
use App\Mail\Admin\AccountCreatedMail;
use App\Mail\Admin\PasswordResendMail;
use App\Models\Role;
use App\Services\PasswordService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PublicUserService
{
    private $passwordService;

    private $password;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    // Generate Random Password
    private function password()
    {
        $this->password = $this->passwordService->randomString();
        return $this->password;
    }


    /* Create New Admin */
    public function saving($request,$model)
    {
        DB::beginTransaction();
        try {
            $request['new_password'] = 1;
            $request['plain_password'] = $this->password();
            $request['password'] = $this->passwordService->passwordEncryption($request['plain_password']);  //  Create encrypted password
            $user = $model->create($request);
            isset($request['roles']) && $this->userAssignRoles($user, $request['roles']); //Assign roles to user
            // Send login credentials to new account
//            Mail::to([$request['email']])->send(new AccountCreatedMail($this->mailData($request)));
            DB::commit();
            return $user;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /* Editing users details */
    public function editing($request,$model): bool
    {
        DB::beginTransaction();
        try {
            $model->update($request);
            isset($request['roles']) ?
                $this->userUpdateRoles($model,$request['roles']) :
                $this->userRemoveRoles($model);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    //Assign Roles to New Admin
    private function userAssignRoles($user, $roles) : void
    {
        $roles = Role::whereIn('id',$roles)->pluck('name');
//        dd($roles);
        $user->assignRole($roles);
    }

    //Update Roles to existing user
    private function userUpdateRoles($user, $roles) : void
    {
        $user->roles()->sync($roles);
    }

    //  Remove all roles from an existing user
    private function userRemoveRoles($user) : void
    {
        $user->roles()->detach();
    }

    // Get Admin data to be used on an email notification
    private function mailData($request)
    {
        return [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['plain_password'],
        ];
    }

    // Password resend function
    public function resendPassword($user)
    {
        $plain_password = $this->password();
        // Capture user details
        $request = [
            'name' => $user->name,
            'email'=>$user->email,
            'password' =>$plain_password,
        ];

        DB::beginTransaction();
        try {
            $user->password = $this->passwordService->passwordEncryption($plain_password);
            $user->new_password = 1;
            $user->save();
//            Mail::to($user->email)->send(new PasswordResendMail($request));
            DB::commit();
            return true;
        }
        catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }



}
