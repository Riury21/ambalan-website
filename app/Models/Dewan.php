<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dewan extends Model
{
    protected $table = 'dewan'; // nama tabel dari migration

    protected $fillable = [
        'nama',
        'jabatan',
        'satuan',
        'angkatan',
        'keaktifan',
        'tanggal_lahir',
        'alamat',
        'nomer_hp',
        'sosial_media',
        'foto',
        'keterangan',
    ];
}
