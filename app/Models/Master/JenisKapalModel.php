<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisKapalModel extends Model
{
    protected $table     = 'jenis_kapal';
    protected $fillable = [
        'kode_jenis_kapal',
        'nama_jenis_kapal',
        'created_at',
        'updated_at'
    ];
}
