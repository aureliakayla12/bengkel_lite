<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->bigIncrements('servis_id');
            $table->foreignId('pelanggan_id')->references('pelanggan_id')->on('pelanggan');
            $table->foreignId('motor_id')->references('motor_id')->on('motor');
            $table->foreignId('mekanik_id')->references('mekanik_id')->on('mekanik');
            $table->date('tanggal_servis');
            $table->text('keluhan')->nullable();
            $table->decimal('biaya_jasa', 12, 2)->default(0); // biaya jasa
            $table->decimal('total_sparepart', 12, 2)->default(0); // total sparepart
            $table->decimal('grand_total', 12, 2)->default(0); // total keseluruhan
            $table->enum('status', ['proses', 'selesai'])->default('proses');
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
        Schema::dropIfExists('servis');
    }
}
