<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	use HasFactory;
	protected $table = 'reports';
	protected $fillable = ['judul', 'tgl', 'pesan', 'foto', 'id_user'];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user', 'id');
	}
}
