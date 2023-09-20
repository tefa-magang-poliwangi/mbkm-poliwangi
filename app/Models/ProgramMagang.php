<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kegiatan',
        'waktu_mulai',
        'waktu_akhir',
        'posisi_mahasiswa',
        'validasi_kaprodi',
        'id_lowongan',
        'id_pl_mitra',
    ];

    // relasi
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function pl_mitra()
    {
        return $this->belongsTo(PlMitra::class, 'id_pl_mitra', 'id');
    }

    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }

    public function laporan_mingguan()
    {
        return $this->hasMany(LaporanMingguan::class);
    }

    public function kompetensi_program()
    {
        return $this->hasMany(KompetensiProgram::class);
    }

    public function ketercapaian_cpl()
    {
        return $this->hasMany(KetercapaianCpl::class);
    }
}
