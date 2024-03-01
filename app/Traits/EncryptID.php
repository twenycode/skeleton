<?php

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait EncryptID
{

    //encode the auto-increment Ids from the database to public
    public function getRouteKey()
    {
        return $this->encode();
    }

    // Function for encoding process
    public function encode()
    {
        return Hashids::encode($this->getKey(), 2024, 04, 15, 15);
    }

    // Decode the primary key
    public function decode($id)
    {
        try {
            return Hashids::decode($id)[0];
        } catch (\Exception $e) {
            return $id;
        }
    }



}
