<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\ReportFactory;

class Report extends BaseModel
{
	protected $table = 'reports';

	protected $fillable = [
		'judul',
		'tgl',
		'pesan',
		'foto',
		'id_pengguna',
		'id_donor'
	];

	public function pengguna()
	{
		return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
	}

	public function donor()
	{
		return $this->belongsTo(Donor::class, 'id_donor', 'id');
	}

	protected static function newFactory()
	{
		return new ReportFactory();
	}
}
