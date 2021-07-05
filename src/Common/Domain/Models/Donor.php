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
		'id_udd',
		'alamat',
		'kelurahan',
		'kecamatan',
		'kota',
		'judul',
		'isi',
		'id_pencocokan'
	];

	public function pendonor()
	{
		return $this->belongsTo(Pengguna::class, 'id_pendonor', 'id');
	}

	public function penerima()
	{
		return $this->belongsTo(Pengguna::class, 'id_penerima', 'id');
	}

	public function report()
	{
		return $this->hasMany(Report::class, 'id_donor', 'id');
	}

	protected static function newFactory()
	{
		return new DonorFactory();
	}

	public function unitDonor() {
		return $this->belongsTo(UnitDonor::class, 'id_udd', 'id');
	}

	public function pencocokan() {
		return $this->belongsTo(Pencocokan::class, 'id_pencocokan', 'id');
	}
}
