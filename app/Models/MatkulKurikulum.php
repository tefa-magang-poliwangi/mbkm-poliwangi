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
        'id_kurikulum',
        'id_matkul',
    ];

    // relasi
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }
}
