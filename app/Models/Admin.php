<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('admin_user',function (Builder $builder) {
            return $builder->where('user_type','admin');
        });
    }

}
