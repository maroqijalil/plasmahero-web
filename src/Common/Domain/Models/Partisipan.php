<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PartisipanFactory;

class Partisipan extends BaseModel
{
	protected $table = 'partisipan';
	protected $fillable = ['id_percakapan', 'id_admin', 'id_pendonor', 'id_penerima', 'created_at', 'updated_at'];

	public function percakapan()
	{
		return $this->belongsTo(Percakapan::class, 'id_percakapan', 'id');
	}

	public function pesan()
	{
		return $this->hasMany(Pesan::class, 'id_partisipan', 'id');
	}

	protected static function newFactory()
	{
		return new PartisipanFactory();
	}
	
	public function admin()
	{
		return $this->belongsTo(User::class, 'id_admin', 'id');
	}

	public function pendonor()
	{
		return $this->belongsTo(User::class, 'id_pendonor', 'id');
	}

	public function penerima()
	{
		return $this->belongsTo(User::class, 'id_penerima', 'id');
	}
}
