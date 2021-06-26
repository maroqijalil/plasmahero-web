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
		'id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user', 'id');
	}

	protected static function newFactory()
	{
		return new ReportFactory();
	}
}
