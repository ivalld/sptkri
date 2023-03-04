<?php

namespace App\Models\Proses;

use Illuminate\Database\Eloquent\Model;

class DokumenKapal extends Model
{
    protected $table 	= 'jenis_dokumen';
    protected $fillable = ['tgl_pelaksanaan','id_pelaksana','catatan','id_skedul'];
}
