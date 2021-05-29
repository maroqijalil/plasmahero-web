<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $fillable = ['no_hp', 'alamat', 'kelurahan', 'kecamatan', 'kota', 'nama_tipe', 'usia', 'jenis_kelamin', 'gol_darah', 'rheus', 'berat_badan', 'tanggal_swab'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}