<?php

namespace App\Models;

use App\Traits\EncryptID;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class BaseModel extends Model
{
    use  EncryptID, LogsActivity;

    //  Class Constructor
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    // What the model to log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }

    /*
    |--------------------
    | MUTATORS VARIABLES
    |--------------------
    */






}
