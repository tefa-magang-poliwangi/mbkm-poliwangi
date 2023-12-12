<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil ID mahasiswa yang sedang login (sesuai dengan asumsi Anda)
        $mahasiswaId = auth()->user()->mahasiswa->first()->id;
        // $lowongan = Lowongan::where();
        // Ambil logbooks terkait dengan mahasiswa tertentu
        $logbooks = Logbook::where('id_mahasiswa', $mahasiswaId)
            ->select('id', 'tanggal', 'kegiatan', 'bukti')
            ->get();

        return view('pages.mahasiswa.laporan-mahasiswa.laporan-harian-internal.index', ['logbooks' => $logbooks]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('pages.mahasiswa.laporan-mahasiswa.laporan-harian-internal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
            'bukti_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if exists
        $buktiImagePath = null;
        if ($request->hasFile('bukti_image')) {
            $buktiImagePath = $request->file('bukti_image')->store('bukti-logbook', 'public');
        }

        // Create a new logbook entry
        Logbook::create([
            'tanggal' => Carbon::parse($request->input('tanggal')),
            'kegiatan' => $request->input('kegiatan'),
            'bukti' => $buktiImagePath,
            'id_program_magang' => 1,
            'id_mahasiswa' => auth()->user()->mahasiswa->firstOrFail()->id,
        ]);

        Alert::success('Success', 'Logbook Harian berhasil di Simpan');
        // Redirect with success message
        return redirect()->route('mahasiswa.laporan.harian.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logbook = Logbook::findOrFail($id);
        return view('pages.mahasiswa.laporan-mahasiswa.laporan-harian-internal.show', ['logbook' => $logbook]);
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
