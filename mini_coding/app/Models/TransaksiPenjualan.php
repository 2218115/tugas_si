<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;    

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi_penjualan';

    protected $primaryKey = 'id_transaksi_penjualan';
    
    public $timestamps = false;
    
    protected $fillable = [
        'id_pengguna',
        'id_jenis_pembayaran',
        'id_distributor',
        'tanggal_transaksi',
        'nominal_pembayaran',
        'nominal_kembalian',
        'status',
        'nominal_total',
        'id_penukaran_poin',
    ];

    public function pengguna(): HasOne {
        return $this->hasOne(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function jenisPembayaran(): HasOne {
        return $this->hasOne(JenisPembayaran::class, 'id_jenis_pembayaran', 'id_jenis_pembayaran');
    }

    public function distributor(): HasOne {
        return $this->hasOne(Pengguna::class, 'id_pengguna', 'id_distributor');
    }
    
    public function penukaranPoin(): HasOne {
        return $this->hasOne(PenukaranPoin::class, 'id_penukaran_poin', 'id_penukaran_poin');
    }
}
