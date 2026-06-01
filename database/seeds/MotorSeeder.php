<?php

use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('motor')->insert([
            [
                'pelanggan_id' => 1,
                'nomor_plat' => 'D 1111 AA',
                'merk' => 'Honda',
                'tipe' => 'Beat',
                'tahun' => 2020,
            ],
            [
                'pelanggan_id' => 2,
                'nomor_plat' => 'D 2222 BB',
                'merk' => 'Yamaha',
                'tipe' => 'Mio',
                'tahun' => 2019,
            ],
            [
                'pelanggan_id' => 3,
                'nomor_plat' => 'D 3333 CC',
                'merk' => 'Honda',
                'tipe' => 'Vario',
                'tahun' => 2021,
            ],
            [
                'pelanggan_id' => 4,
                'nomor_plat' => 'D 4444 DD',
                'merk' => 'Suzuki',
                'tipe' => 'Nex',
                'tahun' => 2018,
            ],
            [
                'pelanggan_id' => 5,
                'nomor_plat' => 'D 5555 EE',
                'merk' => 'Honda',
                'tipe' => 'Scoopy',
                'tahun' => 2022,
            ],
        ]);
    }
}
