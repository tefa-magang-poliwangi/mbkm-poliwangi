<?php

namespace App\Http\Controllers;

use App\Models\BerkasLowongan;
use App\Models\Mitra;
use App\Models\Berkas;
use App\Models\Lowongan;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // Dapatkan ID berkas yang sudah terkait dengan lowongan tertentu
        $selectedBerkasIds = BerkasLowongan::where('id_lowongan', $id_lowongan)->pluck('id_berkas')->toArray();

        // Kecualikan berkas yang sudah dipilih dari berkas yang tersedia
        $availableBerkas = Berkas::where('id_mitra', $mitra->id)->whereNotIn('id', $selectedBerkasIds)->get();

        $data = [
            'berkaslowongan' => BerkasLowongan::all(),
            'berkas' => $availableBerkas,
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
    public function store(Request $request, $id_lowongan)
    {
        $validated = $request->validate([
            'berkas' => [
                'required',
                Rule::unique('berkas_lowongans', 'id_berkas')->where('id_lowongan', $id_lowongan),
            ],
        ]);

        if (isset($validated['berkas'])) {
            $id_berkas = $validated['berkas'];

            foreach ($id_berkas as $berkasID) {
                BerkasLowongan::create([
                    'id_lowongan' => $id_lowongan,
                    'id_berkas' => $berkasID,
                ]);
            }
        }

    Alert::success('Sukses', 'Berkas Lowongan Berhasil Ditambahkan');

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
    public function edit()
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
    public function update(Request $request, )
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
        $berkaslowongan = BerkasLowongan::findOrFail($id);
        $berkaslowongan->delete();

        Alert::success('Success', 'Berkas Lowongan Berhasil Dihapus');

        return redirect()->back();
    }
}
