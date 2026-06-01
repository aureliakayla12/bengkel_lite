<?php

use Illuminate\Database\Seeder;

class DetailServisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('detail_servis')->insert([
            [
                'servis_id' => 1,
                'sparepart_id' => 1,
                'qty' => 1,
                'harga' => 50000,
                'subtotal' => 50000,
            ],
            [
                'servis_id' => 1,
                'sparepart_id' => 2,
                'qty' => 1,
                'harga' => 15000,
                'subtotal' => 15000,
            ],
            [
                'servis_id' => 2,
                'sparepart_id' => 2,
                'qty' => 1,
                'harga' => 15000,
                'subtotal' => 15000,
            ],
            [
                'servis_id' => 3,
                'sparepart_id' => 3,
                'qty' => 1,
                'harga' => 75000,
                'subtotal' => 75000,
            ],
            [
                'servis_id' => 4,
                'sparepart_id' => 4,
                'qty' => 1,
                'harga' => 25000,
                'subtotal' => 25000,
            ],
        ]);
    }
}
