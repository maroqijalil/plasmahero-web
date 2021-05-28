<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donor';
    protected $fillable = ['tipe', 'tanggal', 'waktu', 'nama_udd', 'alamat', 'kelurahan', 'kecamatan', 'kota', 'judul', 'isi'];
}
