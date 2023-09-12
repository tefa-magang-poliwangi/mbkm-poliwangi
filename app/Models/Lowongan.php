<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'jumlah_lowongan',
        'deskripsi',
        'tanggal_dibuka',
        'tanggal_ditutup',
        'tanggal_magang_dimulai',
        'tanggal_magang_berakhir',
        'status',
        'id_mitra',
    ];
}
