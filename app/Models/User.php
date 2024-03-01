<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\EncryptID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use EncryptID,HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity, AuthenticationLoggable;

    protected $table = 'users';

    //  The attributes that are mass assignable.
    protected $fillable = ['name','email','phone','password','user_type'];

    //  The attributes that should be hidden for serialization.
    protected $hidden = ['password','remember_token'];

    //  The attributes that should be cast.
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /*
    |-----------------
    | Accessor
    |-----------------
    */
    // Active users
    public function getActiveAttribute()
    {
        if ($this->isActive) {
            return '<span class="badge text-bg-success">Yes</span>';
        }
        return '<span class="badge text-bg-danger">No</span>';
    }

    // Active users
    public function getVerifiedAttribute()
    {
        if (!is_null($this->email_verified_at)) {
            return '<span class="badge text-bg-success">Yes</span>';
        }
        return '<span class="badge text-bg-danger">No</span>';
    }


    /*
    |--------------
    | Relationship
    |-------------
    */
    // Admin Has many roles relationship
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class,'model_has_roles','model_id');
    }

    // get latest user login details
    public function latestAuthentication()
    {
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany('login_at')->withDefault();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
