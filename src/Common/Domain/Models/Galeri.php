<?php

namespace App\Common\Models;
use Database\Factories\GalleryFactory;

use App\Eloquent\BaseModel;

class Galeri extends BaseModel
{
    protected $table = 'Galeri';

	protected $fillable = [
		'judul',
		'deskripsi',
		'foto'
	];

	protected static function newFactory()
	{
		return new GaleriFactory();
	}
}
