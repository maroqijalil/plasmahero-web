<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\AdminFactory;

class Admin extends BaseModel
{
	protected $table = 'admin';
	protected $fillable = [
		'id_user',
		'no_hp',
		'alamat',
		'kelurahan',
		'kecamatan',
		'kota',
		'created_at',
		'updated_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function notifikasi()
	{
		return $this->hasMany(Notifikasi::class, 'id_admin');
	}

	protected static function newFactory()
	{
		return new AdminFactory();
	}
}
