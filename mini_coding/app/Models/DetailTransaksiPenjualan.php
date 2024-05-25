<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailTransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_transaksi_penjualan';

    protected $primaryKey = 'id_detail_transaksi_penjualan';
    
    public $timestamps = false;
    
    protected $fillable = [
        'id_transaksi_penjualan',
        'id_barang',
        'jumlah',
        'harga',
        'total_harga',
    ];

    public function barang():HasOne {
        return $this->hasOne(Barang::class, 'id_barang', 'id_barang');
    }
}
