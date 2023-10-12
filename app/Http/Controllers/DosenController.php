<?php

namespace App\Http\Controllers;

use App\Imports\DosenImport;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dosens = Dosen::query();

        if ($request->prodi) {
            $dosens->where('id_prodi', $request->prodi);
        }

        $datas = [
            'dosens' => $dosens->get(),
            'prodi' => Prodi::all(),
            'request' => $request,
        ];

        return view('pages.admin.manajemen-dosen.data-dosen', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'prodis' => Prodi::all(),
        ];

        return view('pages.admin.manajemen-dosen.create-dosen', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi request dosen
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'id_prodi' => 'required',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $user_dosen = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user_dosen->assignRole('dosen');

        Dosen::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'id_prodi' => $validated['id_prodi'],
            'id_user' => $user_dosen->id,
        ]);

        Alert::success('Success', 'Berhasil Menambahkan Data Dosen');

        return redirect()->route('manajemen.dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new DosenImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }

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
        $data = [
            'dosen' => Dosen::findOrFail($id),
            'prodis' => Prodi::all(),
        ];

        return view('pages.admin.manajemen-dosen.form-dosen', $data);
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
        $dosen = Dosen::findOrFail($id);

        // validasi request dosen
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'id_prodi' => 'required',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($dosen->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Dosen::where('id', $dosen->id)->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'id_prodi' => $validated['id_prodi'],
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'Berhasil Mengubah Data Dosen');

        return redirect()->route('manajemen.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->id_user);
        $user->delete();
        $dosen->delete();

        Alert::success('Success', 'Berhasil Menghapus Data Dosen');

        return redirect()->route('manajemen.dosen.index');
    }
}
