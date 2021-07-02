<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'cerita';

    protected $fillable = ['id_user', 'cerita'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
