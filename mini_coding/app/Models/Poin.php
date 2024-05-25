<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasOne;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'tb_poin';

    protected $primaryKey = 'id_poin';
    
    public $timestamps = false;
    
    protected $fillable = [
        'id_pelanggan',
        'jumlah_poin',
    ];

    public function pengguna(): HasOne {
        return $this->hasOne(Pengguna::class);
    }
}
