<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPengguna extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_pengguna';

    protected $primaryKey = 'id_detail_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'provinsi',
        'kota',
        'kelurahan',
        'detail_alamat',
        'telepon',
    ];

    public function pengguna(): BelongsTo {
        return $this->belongsTo(Pengguna::class);
    }
}
