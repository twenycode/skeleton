<?php

namespace App\Models;

use Jenssegers\Agent\Agent;

class AuthenticationLog extends BaseModel
{

    protected $table = 'authentication_log';

    // Define variable for agent details
    protected Agent $agent;

    // Initiate Instance
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->agent = new Agent();
    }

    /*
    |----------
    | ACCESSOR
    |----------
    */
    // format login time
    public function getLoginTimeAttribute(): ?string
    {
        return mysqlFormatToDateTime($this->login_at);
    }

    // format logout time
    public function getLogoutTimeAttribute(): ?string
    {
        return mysqlFormatToDateTime($this->logout_at);
    }

    // format login status
    public function getLogSuccessAttribute(): string
    {
        if ($this->login_successful) {
            return '<span class="badge bg-success">Yes</span>';
        }
        return '<span class="badge bg-danger">No</span>';
    }

    // Get user browser form Admin agent
    public function getUserAgentDetailsAttribute(): string
    {
        return $this->browser.' - '.$this->platform;
    }

    // Get user browser form Admin agent
    public function getBrowserAttribute(): bool|string
    {
        return $this->agent->browser($this->user_agent);
    }

    // Get user agent platform form Admin agent
    public function getPlatformAttribute(): bool|string
    {
        return $this->agent->platform($this->user_agent);
    }


    /*
    |--------------
    | RELATIONSHIP
    |-------------
    */
    public function user()
    {
        return $this->belongsTo(User::class,'authenticatable_id','id')->select('id','name')->withDefault();
    }



}
