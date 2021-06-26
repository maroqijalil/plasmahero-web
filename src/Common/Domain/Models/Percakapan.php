<?php

namespace App\Common\Models;

use App\Eloquent\BaseModel;
use Database\Factories\PercakapanFactory;

class Percakapan extends BaseModel
{
	protected $table = 'percakapan';
	protected $fillable = ['judul'];

	public function partisipan()
	{
		return $this->hasOne(Partisipan::class, 'id_percakapan', 'id');
	}

	protected static function newFactory()
	{
		return new PercakapanFactory();
	}
}
