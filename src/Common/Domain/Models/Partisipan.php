<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PartisipanFactory;

class Partisipan extends BaseModel
{
	protected $table = 'partisipan';
	protected $fillable = ['id_percakapan', 'id_admin', 'id_pengguna'];

	public function percakapan()
	{
		return $this->belongsTo(Percakapan::class, 'id_percakapan', 'id');
	}

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'id_admin', 'id');
	}

	public function pengguna()
	{
		return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
	}

	protected static function newFactory()
	{
		return new PartisipanFactory();
	}
}
