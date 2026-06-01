<?php

use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sparepart')->insert([
            ['nama' => 'Oli Mesin', 'stok' => 10, 'harga' => 50000],
            ['nama' => 'Busi', 'stok' => 30, 'harga' => 15000],
            ['nama' => 'Kampas Rem', 'stok' => 20, 'harga' => 75000],
            ['nama' => 'Filter Udara', 'stok' => 15, 'harga' => 25000],
            ['nama' => 'Aki Motor', 'stok' => 5, 'harga' => 300000],
        ]);
    }
}
