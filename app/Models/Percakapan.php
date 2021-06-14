<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percakapan extends Model
{
    use HasFactory;
    protected $table = 'percakapan';
    protected $fillable = ['judul'];

    public function partisipan() {
        return $this->hasOne(Partisipan::class, 'id_percakapan', 'id');
    }
}
