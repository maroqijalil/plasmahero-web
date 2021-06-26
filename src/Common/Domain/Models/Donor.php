<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\DonorFactory;

class Donor extends BaseModel
{
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

	protected static function newFactory()
	{
		return new DonorFactory();
	}
}
