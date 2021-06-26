<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
	use HasFactory;
	protected $table = 'donor';
	protected $fillable = [
		'id_pendonor',
		'id_penerima',
		'tipe',
		'tanggal',
		'waktu',
		'nama_udd',
		'alamat',
		'kelurahan',
		'kecamatan',
		'kota',
		'judul',
		'isi'
	];

	public function pendonor()
	{
		return $this->belongsTo(Pengguna::class, 'id_pendonor', 'id');
	}

	public function penerima()
	{
		return $this->belongsTo(Pengguna::class, 'id_penerima', 'id');
	}
}
