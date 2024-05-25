<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_pembayaran';

    protected $primaryKey = 'id_jenis_pembayaran';

    public $timestamps = false;

    protected $fillable = [
        'jenis',
    ];
}
