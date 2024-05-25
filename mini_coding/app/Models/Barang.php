<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $primaryKey = 'id_barang';
    
    public $timestamps  = false;

    protected $fillable = [
        'nama',
        'satuan',
        'harga',
        'keterangan',
        'id_kategori_barang',
    ];

    public function kategoriBarang(): HasOne {
        return $this->hasOne(KategoriBarang::class, 'id_kategori_barang', 'id_kategori_barang');
    }
}
