<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisDokumenModel extends Model
{
    protected $table     = 'jenis_dokumen';
    protected $fillable = ['jenis_dokumen', 'keterangan', 'kategori'];
}
