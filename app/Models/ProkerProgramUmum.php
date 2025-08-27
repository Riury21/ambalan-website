<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkerProgramUmum extends Model
{
    protected $table = 'proker_program_umum';
    protected $fillable = ['nama_program', 'status'];
}

