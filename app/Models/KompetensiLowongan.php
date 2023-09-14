<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiLowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kompetensi',
        'id_lowongan',
    ];
}
