<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'id_detail_pengguna',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function detailPengguna(): HasOne {
        return $this->hasOne(DetailPengguna::class, 'id_detail_pengguna', 'id_detail_pengguna');
    }
    
}