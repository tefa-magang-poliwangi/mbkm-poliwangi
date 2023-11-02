<?php

namespace App\Http\Controllers;

use App\Models\BerkasLowongan;
use App\Models\Mitra;
use App\Models\Berkas;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class BerkasLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_lowongan)
    {
        $data = [
            'berkaslowongan' => BerkasLowongan::where('id_lowongan', $id_lowongan)->get(),
            'id_lowongan' => $id_lowongan,
            'lowongan' => Lowongan::findOrFail($id_lowongan),
        ];
        return view('pages.mitra.manajemen-berkas-lowongan.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_lowongan)
    {
        $user = Auth::user();
        $mitra = Mitra::where('id_user', $user->id)->first();
        $berkas = Berkas::where('id_mitra', $mitra->id)->get();

        $data = [
            'berkaslowongan' => BerkasLowongan::all(),
            'berkas' => $berkas,
            'lowongan' => Lowongan::where('id_mitra', $id_lowongan)->get(),
            'id_lowongan' => $id_lowongan,
        ];

        return view('pages.mitra.manajemen-berkas-lowongan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id_lowongan)
    {

        $validated = $request->validate([
            'id_lowongan' => ['required'],
            'id_berkas' => ['required'],
        ]);

        BerkasLowongan::create([
            'id_lowongan' => $id_lowongan,
            'id_berkas' => $validated['id_berkas'],
        ]);

        Alert::success('Success', 'Berkas Lowongan Berhasil Ditambahkan');

        return redirect()->route('manajemen.berkas-lowongan.mitra.index', $id_lowongan);
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
    public function edit($id_lowongan, $id_berkas_lowongan)
    {
        $user = Auth::user();
        $mitra = Mitra::where('id_user', $user->id)->first();

        $lowongan = Lowongan::where('id_mitra', $mitra->id)->get();
        $berkas = Berkas::where('id_mitra', $mitra->id)->get();

        $data = [
            'berkaslowongan' =>  BerkasLowongan::findOrFail($id_berkas_lowongan),
            'berkas' => $berkas,
            'lowongan' => $lowongan,
            'id_lowongan' => $id_lowongan,
        ];

        return view('pages.mitra.manajemen-berkas-lowongan.form-update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_lowongan, $id_berkas_lowongan)
    {

        $validated = $request->validate([
            'id_lowongan' => ['required'],
            'id_berkas' => ['required'],
        ]);

        BerkasLowongan::where('id', $id_berkas_lowongan)->update([
            'id_lowongan' => $validated['id_lowongan'],
            'id_berkas' => $validated['id_berkas'],
        ]);

        Alert::success('Success', 'Berkas Lowongan Berhasil Diupdate');

        return redirect()->route('manajemen.berkas-lowongan.mitra.index' ,$id_lowongan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berkaslowongan = BerkasLowongan::findOrFail($id);
        $berkaslowongan->delete();

        Alert::success('Success', 'Berkas Lowongan Berhasil Dihapus');

        return redirect()->back();
    }
}
