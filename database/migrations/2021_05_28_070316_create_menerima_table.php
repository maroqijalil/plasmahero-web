<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenerimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menerima', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id_notifikasi');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_notifikasi')->references('id')->on('notifikasi');
            $table->foreign('id_user')->references('id')->on('pengguna');
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
        Schema::dropIfExists('menerima');
    }
}
