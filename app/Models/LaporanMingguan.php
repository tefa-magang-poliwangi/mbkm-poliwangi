<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMingguan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'keterangan',
        'tgl_mingguan_awal',
        'tgl_mingguan_akhir',
        'validasi_pl',
        'id_mahasiswa',
        'id_program_magang',
        'id_kompetensi_lowongan',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function program_magang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program_magang', 'id');
    }

    public function kompetensi_lowongan()
    {
        return $this->belongsTo(KompetensiLowongan::class, 'id_kompetensi_lowongan', 'id');
    }
}
