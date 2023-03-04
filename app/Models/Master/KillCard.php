<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class KillCard extends Model
{
    protected $table 	= 'doc_killcard';
    protected $fillable = ['id_kapal','judul','id_dokumen','file_upload'];

}
