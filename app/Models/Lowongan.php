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
        'id_prodi'
    ];

    // relasi
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function program_magang()
    {
        return $this->hasMany(ProgramMagang::class);
    }

    public function sektor_lowongan()
    {
        return $this->hasMany(SektorLowongan::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }

    public function kompetensi_lowongan()
    {
        return $this->hasMany(KompetensiLowongan::class);
    }

    public function pelamar_magang()
    {
        return $this->hasMany(PelamarMagang::class);
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }

    public function berkas_lowongan()
    {
        return $this->hasMany(BerkasLowongan::class, 'id_lowongan');
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class);
    }
}
