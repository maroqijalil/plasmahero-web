<?php

namespace App;

use App\Eloquent\BaseModel;

class UnitDonor extends BaseModel
{
	protected $table = 'unit_donor';
	
	protected $fillable = [
		'nama_unit',
		'alamat',
		'no_telp'
	];
}
