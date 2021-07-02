<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->unsignedBigInteger('id_donor')->nullable();
            $table->string('judul')->nullable();
            $table->date('tgl')->nullable();
            $table->string('pesan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('pengguna');
            $table->foreign('id_donor')->references('id')->on('donor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
