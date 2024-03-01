<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','longitude','latitude'];


    /*
    |----------
    | RELATIONSHIP
    |----------
    */

    // Get all of the models that own address.
    public function commentable()
    {
        return $this->morphTo();
    }




}
