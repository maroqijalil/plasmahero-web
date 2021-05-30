<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = ['id_user', 'no_hp', 'alamat', 'kelurahan', 'kecamatan', 'kota'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
