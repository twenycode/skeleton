<?php

namespace App\Models;

use App\Traits\EncryptID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, EncryptID, LogsActivity;

    protected $guard_name = 'web';

    //  The attributes that are mass assignable.
    protected $fillable = [ 'name','descriptions' ];

    /*
    |----------
    | MUTATORS
    |----------
    */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['guard_name'] = $this->guard_name;
    }


    /*
    |-----------------
    | Relationships
    |-----------------
    */
    //  Roles has many permissions
    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions');
    }


    /*
    |-----------
    | Functions
    |-----------
    */

    //  Get Name  and ID of Roles
    public function selectNameId()
    {
        return $this->select('name','id')->orderBy('name','asc')->get();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
