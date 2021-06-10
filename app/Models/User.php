<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pengguna()
    {
        return $this->hasOne(Pengguna::class, 'id_user', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_user', 'id');
    }

    public function pencocokanPenerima()
    {
        return $this->hasMany(Pencocokan::class, 'id_penerima', 'id');
    }

    public function pencocokanPendonor()
    {
        return $this->hasMany(Pencocokan::class, 'id_pendonor', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'id_user', 'id');
    }
}
