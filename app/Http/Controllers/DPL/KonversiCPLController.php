<?php

namespace App\Http\Controllers\DPL;

use App\Models\Cpl;
use App\Models\User;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonversiCPLController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'mahasiswa');
        })->get();

        return view('pages.dosen.pages-dpl.konversi-CPL.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cpls = Cpl::all(); // Menggunakan Cpl, bukan CPL
        $logbooks = Logbook::whereHas('mahasiswa', function ($query) use ($id) {
            $query->where('id_user', $id);
        })->get();
        return view('pages.dosen.pages-dpl.konversi-CPL.edit', compact('cpls', 'logbooks', 'user'));
    }

    public function updateCPL(Request $request, $id)
    {
        $request->validate([
            'cpl_ids' => 'array',
            'cpl_ids.*' => 'exists:cpls,id',
        ]);

        $logbook = Logbook::findOrFail($id);

        $logbook->cpls()->sync($request->input('cpl_ids', []));

        return redirect()->back()->with('success', 'Ketercapaian CPL berhasil diperbarui.');
    }
}