<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordService
{

    // Generate a random string as a password
    public function randomString($length = 10): string
    {
        return Str::random($length);
    }

    // Perform the encryption of the password generated
    public function passwordEncryption($password): string
    {
        return Hash::make($password);
    }

}
