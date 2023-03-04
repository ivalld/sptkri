<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class KomponenModel extends Model
{
    protected $table     = 'pelaksana';
    protected $fillable = ['nama_pelaksana', 'keterangan'];
}
