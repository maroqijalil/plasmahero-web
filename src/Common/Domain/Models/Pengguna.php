<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PenggunaFactory;

class Pengguna extends BaseModel
{
	protected $table = 'pengguna';

	protected $fillable = [
		// umum
		'id_user',
		'id_admin',
		'no_hp',
		'alamat',
		'kelurahan',
		'kecamatan',
		'kota',
		'usia',
		// terkait pendonoran
		'nama_tipe',
		'jenis_kelamin',
		'gol_darah',
		'rhesus',
		'berat_badan',
		'tanggal_swab',
		'status'
	];

	public function report()
	{
		return $this->hasMany(Report::class, 'id_pengguna', 'id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user', 'id');
	}

	public function menerimaDonor()
	{
		return $this->hasMany(Donor::class, 'id_penerima', 'id');
	}

	public function mendonor()
	{
		return $this->hasMany(Donor::class, 'id_pendonor', 'id');
	}

	public function notifikasi()
	{
		return $this->belongsToMany(Notifikasi::class, 'menerima', 'id_pengguna', 'id_notifikasi');
	}

	public function menerima()
	{
		return $this->hasMany(Menerima::class, 'id_user', 'id');
	}

	public function pencocokanPenerima()
	{
		return $this->hasMany(Pencocokan::class, 'id_penerima', 'id');
	}

	public function pencocokanPendonor()
	{
		return $this->hasMany(Pencocokan::class, 'id_pendonor', 'id');
	}

	protected static function newFactory()
	{
		return new PenggunaFactory();
	}
}
