<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kegiatan',
        'bukti',
        'id_program_magang',
        'id_mahasiswa',
    ];
}
