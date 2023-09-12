<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasLowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_lowongan',
        'id_berkas',
    ];
}
