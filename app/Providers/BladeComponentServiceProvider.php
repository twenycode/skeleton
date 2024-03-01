<?php

namespace App\Providers;

use App\View\Components\Auth\PermissionComponent;
use App\View\Components\Auth\RoleComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    //  Register services.
    public function register()
    {
        //
    }

    //  Bootstrap services.
    public function boot()
    {

        /*
        |---------------
        | AUTHORIZATION
        |---------------
        */
        Blade::component('role', RoleComponent::class);
        Blade::component('permission', PermissionComponent::class);




    }
}
