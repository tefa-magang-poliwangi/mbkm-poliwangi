<?php

namespace App\Http\Controllers\DPL;

use App\Models\Cpl;
use App\Models\User;
use App\Models\Dosen;
use App\Models\DosenPL;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Http\Controllers\Controller;

class KonversiCPLController extends Controller
{
    public function index()
    {
        $dosen = Dosen::where('id_user', auth()->id())->first();
        $dosenPl = DosenPL::where('id_dosen', $dosen->id)->first();

        if (!$dosenPl) {
            // Handle the case where DosenPL is not found for the authenticated user
            abort(404, 'DosenPL not found for the authenticated user.');
        }


        $id_dosen_pl = $dosenPl->id;
        // dd($id_dosen_pl);

        $pelamarMagangsDiterima = PelamarMagang::select('dosens.nama AS nama_dosen', 'pelamar_magangs.*')
            ->join('pendamping_lapang_mahasiswas AS plm', 'plm.id_pelamar_magang', 'pelamar_magangs.id')
            ->join('dosen_p_l_s AS dpl', 'dpl.id', 'plm.id_dosen_pl')
            ->join('dosens', 'dosens.id', 'dpl.id_dosen')
            ->where('status_diterima', 'Aktif')
            ->where('plm.id_dosen_pl', $id_dosen_pl)
            ->whereHas('pendampingLapangMahasiswa.dosen_pl', function ($query) use ($id_dosen_pl) {
                $query->where('id', $id_dosen_pl);
            })
            ->get();

        return view('dosen.pages-dpl.konversi-CPL.index', [
            'pelamarMagangs' => $pelamarMagangsDiterima,

        ]);
    }

    public function edit($id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);
        $logbooks = Logbook::where('id_mahasiswa', $mahasiswa->id)->get();
        $cpls = Cpl::all();

        $user = $mahasiswa->user;
        $mahasiswa = $mahasiswa;

        return view('dosen.pages-dpl.konversi-CPL.edit', compact('user', 'mahasiswa', 'logbooks', 'cpls'));
    }

    public function updateCPL(Request $request, $id_logbook)
    {
        $request->validate([
            'cpl_ids' => 'array',
            'cpl_ids.*' => 'exists:cpls,id',
        ]);

        $logbook = Logbook::findOrFail($id_logbook);

        $logbook->cpls()->sync($request->input('cpl_ids', []));

        return redirect()->back()->with('success', 'Ketercapaian CPL berhasil diperbarui.');
    }
}
