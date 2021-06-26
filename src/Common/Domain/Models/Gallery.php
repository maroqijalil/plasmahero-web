<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'description',
		'urlToImage'
	];
}
