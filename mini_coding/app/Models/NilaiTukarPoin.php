<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTukarPoin extends Model
{
    use HasFactory;

    protected $table = 'tb_nilai_tukar_poin';

    protected $primaryKey = 'id_nilai_tukar_poin';

    public $timestamps = false;

    protected $fillable = [
        'nilai_tukar',
        'tanggal_dibuat',
    ];
}
