<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    public function admin_jurusan()
    {
        return $this->hasMany(AdminJurusan::class, 'id_user', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_user', 'id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function mitra()
    {
        return $this->hasMany(Mitra::class);
    }
    public function plmitra()
    {
        return $this->hasMany(PlMitra::class);
    }

    public function logbooks()
    {
        return $this->hasMany(Logbook::class, 'id_mahasiswa', 'id');
    }

    public function nilaiKonversis()
    {
        return $this->hasMany(NilaiKonversi::class, 'id_user', 'id');
    }

    // Relasi dengan model DosenPL
    public function dosen_pl()
    {
        return $this->hasOne(DosenPL::class, 'id_user', 'id');
    }

    // Fungsi untuk menentukan apakah user adalah dosen PL
    public function isDosenPL()
    {
        // Assuming you have a relationship named 'dosen_pl' on your User model
        return $this->dosen_pl()->exists();
    }
}
