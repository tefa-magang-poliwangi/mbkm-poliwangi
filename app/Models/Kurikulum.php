<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'status',
        'id_kurikulum_feeder',
        'id_prodi',
    ];

    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function cpl()
    {
        return $this->hasMany(Cpl::class);
    }

    public function matkul_kurikulum()
    {
        return $this->hasMany(MatkulKurikulum::class);
    }
}
