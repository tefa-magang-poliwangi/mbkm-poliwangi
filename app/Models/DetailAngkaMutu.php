<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAngkaMutu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'batas_atas',
        'batas_bawah',
        'angka_mutu',
        'id_profil_angka_mutu',
    ];

    // relasi
    public function profil_angka_mutu()
    {
        return $this->belongsTo(ProfilAngkaMutu::class, 'id_profil_angka_mutu', 'id');
    }
}
