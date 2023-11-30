<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NilaiKonversi;
use App\Http\Controllers\Controller;

class KonversiNilaiController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'mahasiswa');
        })->get();

        return view('pages.dosen.pages-dpl.konversi-nilai.index', compact('users'));
    }

    public function edit()
    {

        return view('pages.dosen.pages-dpl.konversi-nilai.edit');
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $nilaiKonversi = NilaiKonversi::whereHas('mahasiswa', function ($query) use ($id) {
            $query->where('id_user', $id);
        })->get();
        return view('pages.dosen.pages-dpl.konversi-nilai.edit', compact('nilaiKonversi', 'user'));
    }
}
