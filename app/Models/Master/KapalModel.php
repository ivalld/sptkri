<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class KapalModel extends Model
{
    protected $table     = 'kapal';
    protected $fillable = [
        'id_kapal',
        'no_lambung',
        'nama_kapal',
        'jenis_kapal'
    ];

    // public function pokok(){
    // 	return $this->belongsTo(KomponenPokok::class,'id');
    // }


}
