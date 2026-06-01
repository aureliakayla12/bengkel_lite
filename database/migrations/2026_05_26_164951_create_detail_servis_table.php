<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_servis', function (Blueprint $table) {
            $table->bigIncrements('detail_servis_id');
            $table->foreignId('servis_id')->references('servis_id')->on('servis');
            $table->foreignId('sparepart_id')->references('sparepart_id')->on('sparepart');
            $table->integer('qty')->default(1);
            $table->decimal('harga', 12, 2)->default(0); // harga sparepart saat transaksi
            $table->decimal('subtotal', 12, 2)->default(0); // qty x harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_servis');
    }
}
