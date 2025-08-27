<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkerTimeline extends Model
{
    protected $table = 'proker_timeline';
    protected $fillable = ['bulan','tahun', 'kegiatan', 'status'];
}

