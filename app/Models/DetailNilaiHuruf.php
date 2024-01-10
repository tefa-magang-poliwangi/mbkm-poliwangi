<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNilaiHuruf extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'batas_atas',
        'batas_bawah',
        'nilai_huruf',
        'id_profil_nilai_huruf',
    ];

    // relasi
    public function profil_nilai_huruf()
    {
        return $this->belongsTo(ProfilNilaiHuruf::class, 'id_profil_nilai_huruf', 'id');
    }
}
