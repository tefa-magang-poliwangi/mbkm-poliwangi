<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\DosenPL;
use App\Models\Kaprodi;
use App\Models\PelamarMagang;
use App\Models\PendampingLapangMahasiswa;
use App\Models\PesertaDosen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class DosenPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi_id = AdminProdi::Where('id_user', Auth::user()->id)->first()->id_prodi;

        $datas = [
            'dosens' => Dosen::Where('id_prodi', $prodi_id)->get(),
            'prodi' => Prodi::Where('id', $prodi_id)->get(),
            'dosen_pls' => DosenPL::all(),
            'id_prodi' => $prodi_id
        ];

        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_user = Auth()->user()->id;
        $admin_prodi_user = AdminProdi::where('id_user', $id_user)->first();
        $prodi_user = $admin_prodi_user->id_prodi;

        // mengambil seluruh data dosen dengan role dosen
        $dosens = Dosen::where('id_prodi', $prodi_user)->whereDoesntHave('dosen_pl')->whereHas('user', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'dosen');
            });
        })->get();

        $data = [
            'dosens' => $dosens,
        ];

        return view('pages.admin.Manajemen-dosen-pl.form-data-dosen-pl', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosens' => ['required', 'array', 'min:1'],
        ]);

        $dosen_pl_role = Role::where('name', 'dosen-pembimbing')->first();

        $dosen_convert = collect($validated['dosens']);
        $check_id_dosen = $dosen_convert->except('_token');

        if ($check_id_dosen) {
            foreach ($check_id_dosen as $dosenId) {
                $dosen_user = Dosen::where('id', $dosenId)->first();
                $user = User::findOrFail($dosen_user->id_user);
                $user->removeRole('dosen');

                DosenPL::create([
                    'id_dosen' => $dosenId,
                ]);

                $user->assignRole($dosen_pl_role);
            }
        }
        Alert::success('Success', 'Berhasil Menambahkan Dosen Pendamping Lapang');

        return redirect()->route('manajemen.dosen.pl.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dosen_pl)
    {
        $data = [
            'dosen_pl' => DosenPL::findOrFail($id_dosen_pl),
            'id_dosen_pl' => $id_dosen_pl,
            'pendamping_lapang' => PendampingLapangMahasiswa::where('id_dosen_pl', $id_dosen_pl)->get()
        ];


        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen_role = Role::where('name', 'dosen')->first();

        $dosen_pl = DosenPL::findOrFail($id);
        $dosen_user = Dosen::where('id', $dosen_pl->id_dosen)->first();
        $user = User::findOrFail($dosen_user->id_user);
        $user->removeRole('dosen-pl');
        $dosen_pl->delete();

        $user->assignRole($dosen_role);

        Alert::success('Success', 'Berhasil Mengahapus Dosen Pendamping Lapang');

        return redirect()->route('manajemen.dosen.pl.index');
    }
}