<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
	use HasFactory;

	protected $table = 'pengguna';

	protected $fillable = [
		// umum
		'id_user',
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
		'tanggal_swab'
	];

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
}
