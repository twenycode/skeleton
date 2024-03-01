<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class  BladeDirectiveServiceProvider extends ServiceProvider
{
    /* Register services. */
    public function register()
    {
        //
    }

    /* Bootstrap services. */
    public function boot()
    {

        /* check auth user has permission */
        Blade::if('permissionTo',function ($permission) {

            if(auth()->check()) {
                if (auth()->user()->hasRole('superAdmin')) {
                    return true;
                }
                return auth()->user()->hasAnyPermission($permission);
            }
            return redirect('index');
        });

    }
}
