<?php

use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pelanggan')->insert([
            ['nama' => 'Budi Santoso', 'no_hp' => '0811111111', 'alamat' => 'Bandung'],
            ['nama' => 'Siti Aminah', 'no_hp' => '0822222222', 'alamat' => 'Garut'],
            ['nama' => 'Andi Pratama', 'no_hp' => '0833333333', 'alamat' => 'Jakarta'],
            ['nama' => 'Rina Lestari', 'no_hp' => '0844444444', 'alamat' => 'Bekasi'],
            ['nama' => 'Doni Saputra', 'no_hp' => '0855555555', 'alamat' => 'Cimahi'],
        ]);
    }
}
