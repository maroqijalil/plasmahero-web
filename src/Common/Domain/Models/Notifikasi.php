<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
	use HasFactory;
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
}
