<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Matkul;
use App\Models\MatkulKurikulum;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatkulKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->prodi) {
            $id_prodi = $request->prodi;
        } else {
            $id_prodi = 0;
        }

        $data = [
            'prodi' => Prodi::all(),
            'matkul' => Matkul::all(),
            'kurikulum' => Kurikulum::where('id_prodi', $id_prodi),
            'kurikulum_all' => Kurikulum::all(),
            'matkulkurikulum' => MatkulKurikulum::all(),
        ];

        return view('pages.prodi.data-matkul-kurikulum', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'matkul' => Matkul::all(),
            'kurikulum' => Kurikulum::all(),
            'matkulkurikulum' => MatkulKurikulum::all(),
        ];

        return view('pages.prodi.create-matkul-kurikulum', $data);
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
            'create_semester' => ['required'],
            'create_kurikulum' => ['required'],
            'create_matkul' => ['required'],
        ]);

        MatkulKurikulum::create([
            'semester' => $validated['create_semester'],
            'id_kurikulum' => $validated['create_kurikulum'],
            'id_matkul' => $validated['create_matkul'],
        ]);

        Alert::success('Success', 'Data Matkul Kurikulum Berhasil Ditambahkan');

        return redirect()->route('manajemen.matkul.kurikulum.index');
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
            'update_semester' => ['required'],
            'update_kurikulum' => ['required'],
            'update_matkul' => ['required'],
        ]);

        MatkulKurikulum::where('id', $id)->update([
            'semester' => $validated['update_semester'],
            'id_kurikulum' => $validated['update_kurikulum'],
            'id_matkul' => $validated['update_matkul'],
        ]);

        Alert::success('Success', 'Data Matkul Kurikulum Berhasil Diupdate');

        return redirect()->route('manajemen.matkul.kurikulum.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matkul_kurikulum = MatkulKurikulum::findOrFail($id);
        $matkul_kurikulum->delete();

        Alert::success('Success', 'Data Matkul Kurikulum Berhasil Dihapus');

        return redirect()->route('manajemen.matkul.kurikulum.index');
    }
}
