<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'semester',
        'id_matkul',
        'id_kurikulum',
    ];
}
