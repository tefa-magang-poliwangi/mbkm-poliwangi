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
            'berkas' => ['required'],
        ]);

        if (isset($validated['berkas'])) {
            $id_berkas = $validated['berkas'];

            $berkas = Berkas::all();

            foreach ($id_berkas as $berkasID) {
                if ($berkas->contains('id', $berkasID)) {
                    BerkasLowongan::create([
                        'id_lowongan' => $id_lowongan,
                        'id_berkas' => $berkasID,
                    ]);
                }
            }
        }

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
