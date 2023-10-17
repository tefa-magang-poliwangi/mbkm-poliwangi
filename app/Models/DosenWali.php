<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenWali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_dosen',
    ];

    // relasi
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    public function peserta_dosen()
    {
        return $this->belongsTo(PesertaDosen::class, 'id_dosen_walis', 'id');
    }

}
