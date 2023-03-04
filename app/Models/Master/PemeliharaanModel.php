<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class PemeliharaanModel extends Model
{
    protected $table     = 'kartu_pemeliharaan';
    protected $fillable = [
        'id',
        'kode_pemeliharaan',
        'id_komponen_pokok',
        'id_komponen_sub_pokok',
        'id_sistem',
        'id_sub_sistem',
        'id_pelaksana',
        'id_kapal',
        'komponen',
        'prosedur'
    ];
}
