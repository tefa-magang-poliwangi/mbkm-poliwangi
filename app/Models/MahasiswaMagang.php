<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'periode_aktif',
        'id_mahasiswa',
    ];
}
