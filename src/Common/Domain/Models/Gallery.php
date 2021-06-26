<?php

namespace App\Common\Models;
use Database\Factories\GalleryFactory;

use App\Eloquent\BaseModel;

class Gallery extends BaseModel
{
	protected $fillable = [
		'title',
		'description',
		'urlToImage'
	];

	protected static function newFactory()
	{
		return new GalleryFactory();
	}
}
