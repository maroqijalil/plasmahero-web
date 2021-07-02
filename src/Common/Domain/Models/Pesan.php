<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PesanFactory;

class Pesan extends BaseModel
{
	protected $table = 'pesan';
	protected $fillable = [
		'id_partisipan',
		'id_pengirim',
		'isi'
	];

	public function partisipan()
	{
		return $this->belongsTo(Partisipan::class, 'id_partisipan', 'id');
	}

	public function pengirim()
	{
		return $this->belongsTo(User::class, 'id_pengirim', 'id');
	}

	protected static function newFactory()
	{
		return new PesanFactory();
	}
}
