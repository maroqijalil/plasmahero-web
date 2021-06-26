<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\MenerimaFactory;

class Menerima extends BaseModel
{
	protected $table = 'menerima';
	protected $fillable = [
		'id_user',
		'id_notifikasi'
	];

	public function user()
	{
		return $this->belongsTo(Pengguna::class, 'id_user', 'id');
	}

	public function notifikasi()
	{
		return $this->belongsTo(Notifikasi::class, 'id_notifikasi', 'id');
	}

	protected static function newFactory()
	{
		return new MenerimaFactory();
	}
}
