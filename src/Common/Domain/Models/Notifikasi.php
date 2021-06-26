<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\NotifikasiFactory;

class Notifikasi extends BaseModel
{
	protected $table = 'notifikasi';
	protected $fillable = ['judul', 'isi', 'keterangan', 'tanggal', 'waktu'];

	public function pengguna() {
		return $this->belongsToMany(Pengguna::class, 'menerima', 'id_notifikasi', 'id_pengguna');
	}

	public function admin() {
		return $this->belongsTo(Admin::class, 'id_admin');
	}

	public function menerima() {
		return $this->hasMany(Menerima::class, 'id_notifikasi', 'id');
	}

	protected static function newFactory()
	{
		return new NotifikasiFactory();
	}
}
