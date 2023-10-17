<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\DosenWali;
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
        $prodi_id = AdminProdi::Where('id_user', Auth::user()->id)->first()->id_prodi;

        $datas = [
            'dosens' => Dosen::Where('id_prodi', $prodi_id)->get(),
            'prodi' => Prodi::Where('id', $prodi_id)->first(),
            'dosen_walis' => DosenWali::all(),
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
        $admin_prodi_user = AdminProdi::where('id_user', $id_user)->first();
        $prodi_user = $admin_prodi_user->id_prodi;

        $data = [
            'dosens' => Dosen::where('id_prodi', $prodi_user)
                ->whereDoesntHave('dosen_wali')
                ->get(),
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
                $user->removeRole('dosen');

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
