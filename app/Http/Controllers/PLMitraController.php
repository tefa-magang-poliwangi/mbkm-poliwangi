<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\PlMitra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;

class PLMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $mitra = Mitra::where('id_user', $user_id)->first();

        $data = [
            'plmitra' => PlMitra::where('id_mitra', $mitra->id)->get(),
        ];

        return view('pages.mitra.manajemen-pendamping-mitra.pl-mitra', $data);
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
        $mitra = Mitra::where('id_user', Auth::user()->id)->first();

        $validated = $request->validate([
            'create_nama' => 'required',
            'create_no_telp' => 'required|string|between:11,15',
            'create_email' => 'required|email',
            'create_password' => ['required', 'confirmed', 'min:8'],
            'create_password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $user_pl_mitra = User::create([
            'name' => $validated['create_nama'],
            'email' => $validated['create_email'],
            'username' => $validated['create_email'],
            'password' => bcrypt($validated['create_password']),
        ]);

        $user_pl_mitra->assignRole('pl-mitra');

        PlMitra::create([
            'nama' => $validated['create_nama'],
            'no_telp' => $validated['create_no_telp'],
            'email' => $validated['create_email'],
            'id_mitra' => $mitra->id,
            'id_user' => $user_pl_mitra->id,
        ]);

        Alert::success('Success', 'PL Mitra Berhasil Ditambahkan');

        return redirect()->route('manajemen.pendamping.lapang.mitra.index');
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
        $validated = $request->validate([
            'update_nama' => 'required',
            'update_no_telp' => 'required|string|between:11,15',
            'update_email' => 'required|email',
            'update_password' => ['nullable', 'confirmed', 'min:8'],
            'update_password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        $pl_mitra = PlMitra::findOrFail($id);
        $user = User::findOrFail($pl_mitra->id_user);

        // Menggunakan array kosong untuk $saveData sebagai awalan
        $saveData = [];

        // Pengecekan apakah ada input password
        if (!empty($request->input('update_password'))) {
            // Hash password
            $saveData['update_password'] = bcrypt($request->input('update_password'));
        }

        User::where('id', $user->id)->update([
            'name' => $validated['update_nama'],
            'email' => $validated['update_email'],
            'username' => $validated['update_email'],
        ]);

        // Jika ada password baru, update password
        if (isset($saveData['update_password'])) {
            $user->update(['password' => $saveData['update_password']]);
        }

        PlMitra::where('id', $pl_mitra->id)->update([
            'nama' => $validated['update_nama'],
            'no_telp' => $validated['update_no_telp'],
            'email' => $validated['update_email'],
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'PL Mitra Berhasil Diubah');

        return redirect()->route('manajemen.pendamping.lapang.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plmitra = PlMitra::findOrFail($id);
        $user = User::findOrFail($plmitra->id_user);
        $plmitra->delete();
        $user->delete();

        Alert::success('Success', 'PL Mitra Berhasil Dihapus');

        return redirect()->route('manajemen.pendamping.lapang.mitra.index');
    }
}
