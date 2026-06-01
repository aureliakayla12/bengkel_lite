<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(MotorSeeder::class);
        $this->call(MekanikSeeder::class);
        $this->call(SparepartSeeder::class);
        $this->call(ServisSeeder::class);
        $this->call(DetailServisSeeder::class);
    }
}
