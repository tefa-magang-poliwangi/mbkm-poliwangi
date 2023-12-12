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
        'id_lowongan'
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

    // Relasi dengan model DosenPL
    public function dosenPL()
    {
        return $this->belongsTo(DosenPL::class, 'id_dosen_pl', 'id');
    }

    // Fungsi untuk menentukan apakah user adalah dosen PL
    public function isDosenPL()
    {
        return $this->dosenPL !== null;
    }

    public function pl_mitra()
    {
        return $this->belongsTo(PlMitra::class, 'id_pl_mitra');
    }

    // PelamarMagang model

    // public function laporanAkhir()
    // {
    //     return $this->hasOne(LaporanAkhir::class, 'id_pelamar_magang');
    // }


    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function pendampingLapangMahasiswa()
    {
        return $this->hasOne(PendampingLapangMahasiswa::class, 'id_pelamar_magang', 'id');
    }
}
