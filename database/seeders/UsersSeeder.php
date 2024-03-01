<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Admin',
            'email' => 'antweny@live.com',
            'isActive' => true,
            'email_verified_at' => now(),
            'new_password' => 0,
            'user_type' => 'admin',
            'password' => Hash::make('Password@1'),
        ];
        $user = User::updateOrCreate($user);
        $user->assignRole('superAdmin');
    }
}
