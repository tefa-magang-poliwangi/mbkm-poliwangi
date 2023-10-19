<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\Dosen;
use App\Models\Kaprodi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class KaprodiController extends Controller
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
            'dosen' => Dosen::Where('id_prodi', $prodi_id)->get(),
            'prodi' => Prodi::Where('id', $prodi_id)->first(),
            'kaprodi' => Kaprodi::all(),
        ];

        return view('pages.admin.manajemen-kaprodi.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'periode_mulai' => ['required'],
            'periode_akhir' => ['required'],
            'id_dosen' => ['required'],
            'status' => ['required']
        ]);

        $kaprodi_role = Role::where('name', 'kaprodi')->first();

        // Ambil ID dosen dari request
        $id_dosen = $validated['id_dosen'];

        // Temukan dosen berdasarkan ID
        $dosen_user = Dosen::where('id', $id_dosen)->first();

        if ($dosen_user) {
            // Ambil ID user dari data dosen
            $id_user = $dosen_user->id_user;

            // Temukan user berdasarkan ID user
            $user = User::findOrFail($id_user);

            // Hapus peran "dosen" dari user
            $user->removeRole('dosen');

            // Tambahkan peran "kaprodi" ke user
            $user->assignRole($kaprodi_role);
        }

        Kaprodi::create([
            'periode_mulai' => $validated['periode_mulai'],
            'periode_akhir' => $validated['periode_akhir'],
            'id_dosen' => $id_dosen,
            'status' => $validated['status']
        ]);

        Alert::success('Success', 'Berhasil Menambahkan Data Kaprodi');

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id_kaprodi)
    {
        $dosen_role = Role::where('name', 'dosen')->first();

        $kaprodi = Kaprodi::findOrFail($id_kaprodi);
        $dosen_user = Dosen::where('id', $id_kaprodi)->first();
        $user = User::findOrFail($dosen_user->id_user);
        // $user->removeRole('dosen-wali');
        $kaprodi->delete();

        // $user->assignRole($dosen_role);

        Alert::success('Success', 'Berhasil Mengahapus Dosen Wali');

        return redirect()->route('manajemen.dosen.wali.index');
    }
}
