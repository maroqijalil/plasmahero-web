<?php

namespace App\Common\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Eloquent\BaseModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Database\Factories\UserFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use Notifiable, HasApiTokens;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'password',
		'role',
		'name',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function pengguna()
	{
		return $this->hasOne(Pengguna::class, 'id_user', 'id');
	}

	public function admin()
	{
		return $this->hasOne(Admin::class, 'id_user', 'id');
	}

	public function report()
	{
		return $this->hasMany(Report::class, 'id_user', 'id');
	}

	/* relasi chat */
	public function pesan() //kepemilikan pesan
	{
		return $this->hasMany(Pesan::class, 'id_user', 'id');
	}

	//partisipasi pada grup chat
	public function partisipan_admin()
	{
		return $this->hasMany(Partisipan::class, 'id_admin', 'id');
	}

	public function partisipan_pendonor()
	{
		return $this->hasMany(Partisipan::class, 'id_pendonor', 'id');
	}

	public function partisipan_penerima()
	{
		return $this->hasMany(Partisipan::class, 'id_penerima', 'id');
	}
	/* */

	protected static function newFactory()
	{
		return new UserFactory();
	}
	
    public function cerita() {
        return $this->hasMany(Cerita::class, 'id_user', 'id');
    }
}
