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
}
