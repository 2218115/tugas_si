<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori_barang';

    protected $primaryKey = 'id_kategori_barang';

    protected $fillable = [
        'nama',
    ];
    
    public $timestamps = false;

    public function barangs(): BelongsTo {
        return $this->belongsTo(Barang::class);
    }
}
