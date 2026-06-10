<?php

use Illuminate\Database\Seeder;

class ServisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servis')->insert([
            [
                'pelanggan_id' => 1,
                'motor_id' => 1,
                'mekanik_id' => 1,
                'tanggal_servis' => now(),
                'keluhan' => 'Motor tidak bisa hidup',
                'biaya_jasa' => 50000,
                'total_sparepart' => 65000,
                'grand_total' => 115000,
                'status' => 'selesai',
            ],
            [
                'pelanggan_id' => 2,
                'motor_id' => 2,
                'mekanik_id' => 2,
                'tanggal_servis' => now(),
                'keluhan' => 'Rem kurang pakem',
                'biaya_jasa' => 40000,
                'total_sparepart' => 15000,
                'grand_total' => 55000,
                'status' => 'proses',
            ],
            [
                'pelanggan_id' => 3,
                'motor_id' => 3,
                'mekanik_id' => 3,
                'tanggal_servis' => now(),
                'keluhan' => 'Tarikan berat',
                'biaya_jasa' => 60000,
                'total_sparepart' => 75000,
                'grand_total' => 135000,
                'status' => 'selesai',
            ],
            [
                'pelanggan_id' => 4,
                'motor_id' => 4,
                'mekanik_id' => 4,
                'tanggal_servis' => now(),
                'keluhan' => 'Motor berisik',
                'biaya_jasa' => 50000,
                'total_sparepart' => 25000,
                'grand_total' => 75000,
                'status' => 'proses',
            ],
            [
                'pelanggan_id' => 5,
                'motor_id' => 5,
                'mekanik_id' => 5,
                'tanggal_servis' => now(),
                'keluhan' => 'Servis rutin',
                'biaya_jasa' => 80000,
                'total_sparepart' => 0,
                'grand_total' => 80000,
                'status' => 'selesai',
            ],
        ]);
    }
}
