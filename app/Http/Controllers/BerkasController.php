<?php

namespace App\Http\Controllers;
use App\Models\Mitra;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BerkasController extends Controller
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
            'berkas' => Berkas::where('id_mitra', $mitra->id)->get(),
        ];

        return view('pages.mitra.manajemen-berkas.berkas', $data);
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
            'create_nama' => ['required'],
            'create_ukuran_max' => ['required'],
        ]);

        Berkas::create([
            'nama' => $validated['create_nama'],
            'ukuran_max' => $validated['create_ukuran_max'],
            'id_mitra' => $mitra->id,
        ]);

        Alert::success('Success', 'Berkas Berhasil Ditambahkan');

        return redirect()->route('manajemen.berkas.mitra.index');
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
        $mitra_id = Mitra::where('id_user', Auth::user()->id)->first();

        $validated = $request->validate([
            'update_nama' => ['required'],
            'update_ukuran_max' => ['required'],
        ]);

        Berkas::where('id', $id)->update([
            'nama' => $validated['update_nama'],
            'ukuran_max' => $validated['update_ukuran_max']
        ]);

        Alert::success('Success', 'Berkas Berhasil Diupdate');

        return redirect()->route('manajemen.berkas.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();

        Alert::success('Success', 'Berkas Berhasil Dihapus');

        return redirect()->route('manajemen.berkas.mitra.index');
    }
}
