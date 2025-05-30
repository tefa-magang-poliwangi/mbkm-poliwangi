<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use App\Models\AdminProdi;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\DosenWali;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class DosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan_id = AdminJurusan::where('id_user', Auth::user()->id)->first();

        $datas = [
            'dosens' => Dosen::Where('id_jurusan', $jurusan_id)->get(),
            'jurusan' => Jurusan::Where('id', $jurusan_id)->first(),
            'dosen_walis' => DosenWali::whereHas('dosen', function ($query) use ($jurusan_id) {
                $query->where('id_jurusan', $jurusan_id->id_jurusan);
            })->get(),
        ];

        return view('pages.admin.Manajemen-dosen-wali.data-dosen-wali', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_user = Auth()->user()->id;
        $admin_jurusan = AdminJurusan::where('id_user', $id_user)->first();

        // mengambil seluruh data dosen dengan role dosen
        $dosens = Dosen::where('id_jurusan', $admin_jurusan->id_jurusan)->whereDoesntHave('dosen_wali')->whereHas('user', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'dosen');
            });
        })->get();

        $data = [
            'dosens' => $dosens,
        ];

        return view('pages.admin.Manajemen-dosen-wali.form-data-dosen-wali', $data);
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

        $dosen_wali_role = Role::where('name', 'dosen-wali')->first();

        $dosen_convert = collect($validated['dosens']);
        $check_id_dosen = $dosen_convert->except('_token');

        if ($check_id_dosen) {
            foreach ($check_id_dosen as $dosenId) {
                $dosen_user = Dosen::where('id', $dosenId)->first();
                $user = User::findOrFail($dosen_user->id_user);
                // $user->removeRole('dosen');

                DosenWali::create([
                    'id_dosen' => $dosenId,
                ]);

                $user->assignRole($dosen_wali_role);
            }
        }
        Alert::success('Success', 'Berhasil Menambahkan Dosen Wali');

        return redirect()->route('manajemen.dosen.wali.index');
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
    public function destroy($id_dosen_wali)
    {
        $dosen_role = Role::where('name', 'dosen')->first();

        $dosen_wali = DosenWali::findOrFail($id_dosen_wali);
        $dosen_user = Dosen::where('id', $dosen_wali->id_dosen)->first();
        $user = User::findOrFail($dosen_user->id_user);
        $user->removeRole('dosen-wali');
        $dosen_wali->delete();

        $user->assignRole($dosen_role);

        Alert::success('Success', 'Berhasil Mengahapus Dosen Wali');

        return redirect()->route('manajemen.dosen.wali.index');
    }
}
