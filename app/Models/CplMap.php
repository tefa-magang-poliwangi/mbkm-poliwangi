<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CplMap extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_logbook',
        'id_cpl',
    ];

    // Relasi dengan tabel logbooks
    public function logbook()
    {
        return $this->belongsTo(Logbook::class, 'id_logbook');
    }

    // Relasi dengan tabel cpls
    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl');
    }
}