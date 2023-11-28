<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'semester',
        'tahun',
        'status'
    ];

    // relasi
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function nilai_magang_ext()
    {
        return $this->hasMany(NilaiMagangExt::class);
    }

    public function magang_ext()
    {
        return $this->hasMany(MagangExt::class);
    }

    public function transkrip_mitra()
    {
        return $this->hasMany(TranskripMitra::class);
    }
}
