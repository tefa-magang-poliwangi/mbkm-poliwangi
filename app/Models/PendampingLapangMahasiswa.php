<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendampingLapangMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_dosen',
        'id_mahasiswa',
        'id_pl_mitra',
        'id_lowongan',
    ];

    // relasi
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function pl_mitra()
    {
        return $this->belongsTo(PlMitra::class, 'id_pl_mitra', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }
}
