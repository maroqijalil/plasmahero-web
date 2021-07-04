<?php

namespace App\Common\Models;

use Database\Factories\GalleryFactory;

use App\Eloquent\BaseModel;

class Galeri extends BaseModel
{
  protected $table = 'galeri';

  protected $fillable = [
    'judul',
    'deskripsi',
    'foto'
  ];

  protected static function newFactory()
  {
    return new GalleryFactory();
  }
}
