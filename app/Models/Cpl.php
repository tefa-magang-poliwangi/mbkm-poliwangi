<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',   
        'kode_cpl',
        'deskripsi',
        'jenis_cpl',
        'id_kurikulum',
    ];
}
