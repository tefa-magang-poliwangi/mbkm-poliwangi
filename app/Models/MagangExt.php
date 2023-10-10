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
        'id_periode',
    ];

    // relasi
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
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
