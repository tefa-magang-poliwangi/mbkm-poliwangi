<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kegiatan',
        'bukti',
        'tanggal',
        'id_program_magang',
        'id_mahasiswa',
    ];

    // relasi
    public function program_magang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program_magang', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function komentar_logbooks()
    {
        return $this->hasMany(KomentarLogbook::class, 'id_logbook');
    }
}
