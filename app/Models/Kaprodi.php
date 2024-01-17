<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'periode_mulai',
        'periode_akhir',
        'status',
        'id_dosen',
        'id_prodi',
    ];

    // relasi
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
}
