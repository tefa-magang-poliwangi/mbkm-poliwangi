<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'abjad_kelas',
        'tingkat_kelas',
        'id_prodi',
        'id_periode',
    ];

    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }

    public function peserta_kelas()
    {
        return $this->hasMany(PesertaKelas::class);
    }
}
