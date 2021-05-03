<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_detail';

    protected $fillable = [
        'usia',
        'jenis_kelamin',
        'gol_dar',
        'rhesus',
        'berat_badan',
        'tgl_swab',
    ];
}
