<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilNilaiHuruf extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'status',
        'id_periode',
    ];

    // relasi
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }
}
