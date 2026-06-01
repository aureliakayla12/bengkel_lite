<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@bengkel.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ],
            [
                'name' => 'Mekanik User',
                'email' => 'mekanik@bengkel.com',
                'password' => Hash::make('123456'),
                'role' => 'mekanik',
            ],
        ]);
    }
}
