<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Country extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name', 'iso', 'currency_code', 'phone_code', 'postcode','longitude','latitude',];


    /*
    |----------
    | MUTATORS
    |----------
    */

    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['address'] = ucwords(strtolower($value));
    }

    protected function setIsoAttribute($value)
    {
        $this->attributes['iso'] = strtoupper($value);
    }

    protected function setCurrencyCodeAttribute($value)
    {
        $this->attributes['currency_code'] = strtoupper($value);
    }


    /*
    |----------
    | ACCESSOR
    |----------
    */
    protected function getCountryNameAttribute()
    {
        if(!is_null($this->iso)) {
            return $this->name.' ('.$this->iso.')';
        }
        return $this->name;
    }


    /*
    |--------------
    | RELATIONSHIP
    |--------------
    */
    // contry can have many addresses
    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }




    /*
    |------------
    | FUNCTIONS
    |------------
    */

    // get list of all countries name
    public function getCountryNames()
    {
        return $this->select('id','name','iso')->orderBy('name','asc')->get();
    }

    public static function getID($data)
    {
        $objectId = self::select('id')->where('name',$data)->first();
        return $objectId->id;
    }





}
