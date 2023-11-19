<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendampingLapangMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_dosen_pl',
        'id_pelamar_magang',
        'id_pl_mitra',
        'id_lowongan',
    ];

    // relasi
    public function dosen_pl()
    {
        return $this->belongsTo(DosenPL::class, 'id_dosen_pl', 'id');
    }

    public function pelamar_magang()
    {
        return $this->belongsTo(PelamarMagang::class, 'id_pelamar_magang', 'id');
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
