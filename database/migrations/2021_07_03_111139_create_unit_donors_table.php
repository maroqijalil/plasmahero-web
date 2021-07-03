<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitDonorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit_donor', function (Blueprint $table) {
			$table->id();
			$table->string('nama_unit')->nullable();
			$table->string('no_telp')->nullable();
			$table->string('alamat')->nullable();
			$table->string('kelurahan')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kota')->nullable();
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
		Schema::dropIfExists('unit_donor');
	}
}
