<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KritikDanSaran extends Model
{
    use HasFactory;

    protected $table = 'tb_kritik_dan_saran';
    
    protected $primaryKey = 'id_kritik_dan_saran';

    protected $fillable = [
        'id_pengguna',
        'saran_kritik',
        'tanggal_submit',
    ];
    
    public $timestamps = false;

    public function pengguna(): HasOne {
        return $this->hasOne(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
}
