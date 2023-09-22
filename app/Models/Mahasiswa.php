<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nim',
        'password',
        'nama',
        'prodi',
        'angkatan',
        'email',
        'no_telp',
    ];

    // relasi
    public function peserta_kelas()
    {
        return $this->hasMany(PesertaKelas::class);
    }

    public function mahasiswa_magang()
    {
        return $this->hasMany(MahasiswaMagang::class);
    }

    public function nilai_magang_ext()
    {
        return $this->hasMany(NilaiMagangExt::class);
    }

    public function nilai_magang()
    {
        return $this->hasMany(NilaiMagang::class);
    }

    public function pelamar_magang()
    {
        return $this->hasMany(PelamarMagang::class);
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class);
    }

    public function ketercapaian_cpl()
    {
        return $this->hasMany(KetercapaianCpl::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }

    public function log_book()
    {
        return $this->hasMany(Logbook::class);
    }

    public function laporan_mingguan()
    {
        return $this->hasMany(LaporanMingguan::class);
    }
}
