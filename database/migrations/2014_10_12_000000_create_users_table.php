<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->string('role')->nullable();

            // $table->string('no_hp')->nullable();
            // $table->string('alamat')->nullable();
            // $table->string('kelurahan')->nullable();
            // $table->string('kecamatan')->nullable();
            // $table->string('kota')->nullable();
            // $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->text('profile_photo_path')->nullable();
            // $table->timestamps();
=======
            $table->rememberToken();
            $table->timestamps();
>>>>>>> 076c2d4ec84dac0fe7f86c8fa73abde2a2ec6f66
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
