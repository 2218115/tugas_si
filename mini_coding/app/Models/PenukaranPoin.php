<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PenukaranPoin extends Model
{
    use HasFactory;

    protected $table = 'tb_penukaran_poin';

    protected $primaryKey = 'id_penukaran_poin';
    
    public $timestamps = false;

    protected $fillable = [
        'id_nilai_tukar_poin',
        'tanggal_penukaran',
        'jumlah_poin_ditukar',
    ];

    public function nilaiTukarPoin(): HasOne {
        return $this->hasOne(NilaiTukarPoin::class, 'id_nilai_tukar_poin', 'id_nilai_tukar_poin');
    }
    
    public function transaksiPenjualan(): BelongsTo {
        return $this->belongsTo(TransaksiPenjualan::class, 'id_penukaran_poin', 'id_penukaran_poin');
    }
}
