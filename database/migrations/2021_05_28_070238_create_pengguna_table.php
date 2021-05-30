<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengguna', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('id_admin')->nullable();
			$table->unsignedBigInteger('id_user')->nullable();
			$table->string('no_hp')->nullable();
			$table->string('alamat')->nullable();
			$table->string('kelurahan')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kota')->nullable();
			$table->string('nama_tipe')->nullable();
			$table->unsignedBigInteger('usia')->nullable();
			$table->string('jenis_kelamin')->nullable();
			$table->string('gol_darah')->nullable();
			$table->string('rhesus')->nullable();
			$table->unsignedInteger('berat_badan')->nullable();
			$table->date('tanggal_swab')->nullable();

			$table->foreign('id_admin')->references('id')->on('users');
			$table->foreign('id_user')->references('id')->on('users');
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
		Schema::dropIfExists('pengguna');
	}
}
