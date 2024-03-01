<?php

namespace App\Models;

use App\Traits\EncryptID;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use EncryptID, LogsActivity;

    /*
    |----------
    | MUTATORS
    |----------
    */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['group_name'] = $this->addGroupName($value);
    }


    /*
    |-----------------
    | Relationships
    |-----------------
    */

    // Permissions can belong to many roles
    public function role()
    {
        return $this->belongsToMany(Role::class,'role_has_permissions');
    }



    /*
    |-----------
    | Accessors
    |-----------
    */
    //  Get permission action from permission name
    public function getActionAttribute()
    {
        return substr($this->name,strpos($this->name,"_") + 1);
    }


    /*
    |-----------
    | Functions
    |-----------
    */
    //  add group name to a permission
    private function addGroupName($value)
    {
        return ucwords(str_replace("-"," ",substr($value,0,strpos($value,"_"))));
    }

    // Get Name. ID and Group name of permissions and sort by name and group by group_name
    public function nameByGroupName()
    {
        return $this->select('name','id','group_name')->get()->sortBy('name')->groupBy('group_name');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
