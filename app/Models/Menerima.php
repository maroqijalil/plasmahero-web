<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menerima extends Model
{
    use HasFactory;
    protected $table = 'menerima';
    protected $fillable = ['id_user', 'id_notifikasi'];

    public function user() {
        return $this->belongsTo(Pengguna::class, 'id_user', 'id');
    }

    public function notifikasi() {
        return $this->belongsTo(Notifikasi::class, 'id_notifikasi', 'id');
    }
}
