<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PencocokanFactory;

class Pencocokan extends BaseModel
{
	protected $table = 'pencocokan_donor';
	protected $fillable = ['id_admin', 'id_pendonor', 'id_penerima'];

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'id_admin', 'id');
	}

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
		return new PencocokanFactory();
	}

	public function donor() {
		return $this->hasOne(Donor::class, 'id_pencocoka', 'id');
	}
}
