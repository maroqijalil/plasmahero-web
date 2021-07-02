<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartisipanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partisipan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_percakapan');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_pendonor')->nullable();
            $table->unsignedBigInteger('id_penerima')->nullable();
            $table->string('tipe_partisipan')->nullable();

            $table->foreign('id_percakapan')->references('id')->on('percakapan');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->foreign('id_pendonor')->references('id')->on('users');
            $table->foreign('id_penerima')->references('id')->on('users');

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
        Schema::dropIfExists('partisipan');
    }
}
