<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'id_jenis_program',
        'id_periode',
        'id_prodi',
    ];

    // relasi
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
    public function jenis_program()
    {
        return $this->belongsTo(JenisProgram::class, 'id_jenis_program', 'id');
    }

    public function nilai_magang_ext()
    {
        return $this->hasMany(NilaiMagangExt::class);
    }

    public function penilaian_magang_ext()
    {
        return $this->hasMany(PenilaianMagangExt::class);
    }
}
