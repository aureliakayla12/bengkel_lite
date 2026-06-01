<?php

use Illuminate\Database\Seeder;

class MekanikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('mekanik')->insert([
            ['nama' => 'Agus', 'no_hp' => '0812000001', 'alamat' => 'Bandung'],
            ['nama' => 'Beni', 'no_hp' => '0812000002', 'alamat' => 'Garut'],
            ['nama' => 'Candra', 'no_hp' => '0812000003', 'alamat' => 'Jakarta'],
            ['nama' => 'Dedi', 'no_hp' => '0812000004', 'alamat' => 'Bekasi'],
            ['nama' => 'Eko', 'no_hp' => '0812000005', 'alamat' => 'Cimahi'],
        ]);
    }
}
