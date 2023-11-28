<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status_diterima',
        'id_mahasiswa',
        'id_lowongan',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }
    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class, 'id_pelamar_magang', 'id');
    }

    public function transkrip_mitra()
    {
        return $this->hasMany(TranskripMitra::class, 'id_mahasiswa');
    }
}
