<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencocokan extends Model
{
    use HasFactory;
    protected $table = 'pencocokan_donor';
    protected $fillable = ['id_admin', 'id_pendonor', 'id_penerima'];

    public function admin() {
        return $this->belongsTo(Admin::class, 'id_admin', 'id');
    }

    public function pendonor() {
        return $this->belongsTo(Pengguna::class, 'id_pendonor', 'id');
    }

    public function penerima() {
        return $this->belongsTo(Pengguna::class, 'id_penerima', 'id');
    }
}
