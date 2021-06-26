<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
	use HasFactory;
	protected $table = 'pesan';
	protected $fillable = ['id_partisipan', 'id_pengirim', 'pesan'];

	public function partisipan()
	{
		return $this->belongsTo(Partisipan::class, 'id_partisipan', 'id');
	}

	public function pengirim()
	{
		return $this->belongsTo(User::class, 'id_pengirim', 'id');
	}
}
