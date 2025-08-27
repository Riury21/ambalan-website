<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkerVisiMisi extends Model
{
    protected $table = 'proker_visi_misi';
    protected $fillable = ['jenis', 'isi'];
}

