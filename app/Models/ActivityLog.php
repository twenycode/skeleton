<?php

namespace App\Models;

use App\Traits\EncryptID;
use Jenssegers\Agent\Agent;
use Spatie\Activitylog\Models\Activity as SpatieActivityLog;


class ActivityLog extends SpatieActivityLog
{
    use EncryptID;

    // Database table
    protected $table = 'activity_log';

    // Define variable for agent details
    protected Agent $agent;

    //  Store this data automatically
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->url = request()->url();
            $model->ip_address = request()->ip();
            $model->user_agent = request()->header('user-agent');
        });
    }

    // Initiate Instance
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->agent = new Agent();
    }

    /*
     |---------------
     | ACCESSOR
     |---------------
     */
    // Format mysql date and time
    public function getDateAttribute(): ?string
    {
        return mysqlFormatToDateTime($this->created_at);
    }

    public function getDataAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->properties;
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
     |---------------
     | RELATIONSHIPS
     |---------------
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'causer_id')->select('id','name')->withDefault();
    }



}
