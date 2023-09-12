<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file',
        'id_mahasiswa',
        'id_lowongan',
        'id_berkas_lowongan',
    ];
}
