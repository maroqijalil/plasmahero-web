<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partisipan extends Model
{
	use HasFactory;
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
}
