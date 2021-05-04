<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('user_id')->nullable();
            $table->integer('usia')->nullable();
            $table->char('jenis_kelamin', 1)->nullable();
            $table->string('gol_dar')->nullable();
            $table->string('rhesus')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->date('tgl_swab')->nullable();
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
        Schema::dropIfExists('user_detail');
    }
}
