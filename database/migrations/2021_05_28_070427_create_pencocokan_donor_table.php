<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencocokanDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencocokan_donor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_pendonor');
            $table->unsignedBigInteger('id_penerima');

            $table->foreign('id_admin')->references('id')->on('admin');
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
        Schema::dropIfExists('pencocokan_donor');
    }
}
