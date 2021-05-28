<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pendonor')->nullable();
            $table->unsignedBigInteger('id_penerima')->nullable();

            $table->string('tipe')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('nama_udd')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();

            $table->foreign('id_pendonor')->references('id')->on('pengguna');
            $table->foreign('id_penerima')->references('id')->on('pengguna');

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
        Schema::dropIfExists('donor');
    }
}
