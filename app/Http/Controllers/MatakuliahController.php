<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'matakuliah' => Matkul::all()
        ];
        return view('pages.prodi.matkul.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'matakuliah' => Matkul::all()
        ];

        return view('pages.prodi.matkul.create', $data);

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
            'create_matkul' => ['required', 'string'],
            'create_kode_matkul' => ['required', 'string'],
            'create_sks' => ['required'],
        ]);

        Matkul::create([
            'nama' => $validated['create_matkul'],
            'kode_matakuliah' => $validated['create_kode_matkul'],
            'sks' => $validated['create_sks'],
        ]);

        return redirect()->route('daftar.matakuliah.index');
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
            'update_matkul' => ['required', 'string'],
            'update_kode_matkul' => ['required', 'string'],
            'update_sks' => ['required'],
        ]);

        Matkul::where('id', $id)->update([
            'nama' => $validated['update_matkul'],
            'kode_matakuliah' => $validated['update_kode_matkul'],
            'sks' => $validated['update_sks'],
        ]);
        return redirect()->route('daftar.matakuliah.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        return redirect()->route('daftar.matakuliah.index');
    }
}
