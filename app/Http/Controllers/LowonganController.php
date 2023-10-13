<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Mitra;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lowongan' => Lowongan::all(),
            'mitras' => Mitra::all(),
        ];

        return view('pages.mitra.manajemen-lowongan-mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'lowongan' => Lowongan::all(),
            'mitra' => Mitra::all()
        ];

        return view('pages.mitra.manajemen-lowongan-mitra.create', $data);
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
            'nama' => ['required'],
            'jumlah_lowongan' => ['required'],
            'deskripsi' => ['required'],
            'tanggal_dibuka' => ['required'],
            'tanggal_ditutup' => ['required'],
            'tanggal_magang_dimulai' => ['required'],
            'tanggal_magang_berakhir' => ['required'],
            'status' => ['required'],
            'id_mitra' => ['required']
        ]);

        Lowongan::create([
            'nama' => $validated['nama'],
            'jumlah_lowongan' => $validated['jumlah_lowongan'],
            'deskripsi' => $validated['deskripsi'],
            'tanggal_dibuka' => $validated['tanggal_dibuka'],
            'tanggal_ditutup' => $validated['tanggal_ditutup'],
            'tanggal_magang_dimulai' => $validated['tanggal_magang_dimulai'],
            'tanggal_magang_berakhir' => $validated['tanggal_magang_berakhir'],
            'status' => $validated['status'],
            'id_mitra' =>$validated['id_mitra']
        ]);

        Alert::success('Success', 'Lowongan Mitra Berhasil Ditambahkan');

        return redirect()->route('pages.mitra.manajemen-lowongan-mitra.index');
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
        $data = [
            'lowongan' => Lowongan::all(),
        ];

        return view('pages.mitra.manajemen-lowongan-mitra.form-update', $data);
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
        //
    }
}
