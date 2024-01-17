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
    public function index($id_kurikulum)
    {
        $data = [
            'prodi' => Prodi::all(),
            'matkul' => Matkul::all(),
            'kurikulum' => Kurikulum::where('id', $id_kurikulum)->get(),
            'matkulkurikulum' => MatkulKurikulum::where('id_kurikulum', $id_kurikulum)->get(),
            'id_kurikulum' => $id_kurikulum,
        ];

        return view('pages.prodi.data-matkul-kurikulum', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_kurikulum)
    {
        $kurikulum = Kurikulum::findOrFail($id_kurikulum);
        $prodi = $kurikulum->prodi->id_prodi;

        $selectedBerkasIds = MatkulKurikulum::where('id_kurikulum', $id_kurikulum)->pluck('id_matkul')->toArray();

        // Kecualikan berkas yang sudah dipilih dari berkas yang tersedia
        $matkuls = Matkul::where('id_prodi', $prodi)->whereNotIn('id', $selectedBerkasIds)->get();

        $data = [
            'matkul' => $matkuls,
            'matkulkurikulum' => MatkulKurikulum::all(),
            'kurikulum' => $kurikulum,
            'id_kurikulum' => $id_kurikulum,
        ];

        return view('pages.prodi.create-matkul-kurikulum', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_kurikulum)
    {
        $validated = $request->validate([
            'semester' => ['required'],
            'matkul' => ['required', 'array', 'min:1'],
        ]);

        $semester = $validated['semester'];
        // $id_kurikulum = '...'; // Gantilah dengan nilai yang sesuai sesuai cara Anda mendapatkan id_kurikulum.

        if (isset($validated['matkul'])) {
            $id_matkul = $validated['matkul'];

            $matkul = Matkul::all();

            foreach ($id_matkul as $matkulID) {
                if ($matkul->contains('id', $matkulID)) {
                    MatkulKurikulum::create([
                        'semester' => $semester,
                        'id_kurikulum' => $id_kurikulum,
                        'id_matkul' => $matkulID,
                    ]);
                }
            }
        }

        Alert::success('Success', 'Data Matkul Kurikulum Berhasil Ditambahkan');

        return redirect()->route('manajemen.matkul.kurikulum.index', $id_kurikulum);
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
    public function update(Request $request, $id_kurikulum)
    {
        $validated = $request->validate([
            'update_semester' => ['required'],
            'update_kurikulum' => ['required'],
            'update_matkul' => ['required'],
        ]);

        MatkulKurikulum::where('id', $id_kurikulum)->update([
            'semester' => $validated['update_semester'],
            'id_kurikulum' => $validated['update_kurikulum'],
            'id_matkul' => $validated['update_matkul'],
        ]);

        Alert::success('Success', 'Data Matkul Kurikulum Berhasil Diupdate');

        return redirect()->route('manajemen.matkul.kurikulum.index', $id_kurikulum);
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

        return redirect()->back();
    }
}
