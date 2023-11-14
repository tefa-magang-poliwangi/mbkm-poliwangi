<?php

namespace App\Http\Controllers\PLMitra;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NilaiMagang;
use App\Models\Penilaian;

class PenilaianPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'penilaian' => NilaiMagang::all()
        ];
        return view('pages.plmitra.layouts.penilaian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('pages.plmitra.layouts.penilaian.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data dari formulir
        $request->validate([
            'nilai' => 'required|numeric', // Sesuaikan dengan aturan validasi yang dibutuhkan
            // Tambahkan aturan validasi untuk input lain sesuai kebutuhan
        ]);

        // Membuat data penilaian baru
        NilaiMagang::create([
            'nilai' => $request->input('nilai'),
            // Tambahkan atribut lain sesuai kebutuhan
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil ditambahkan');
    }

    public function show($id)
    {
        // Mengambil data penilaian berdasarkan ID
    $penilaian = NilaiMagang::find($id);

    // Memeriksa apakah penilaian ditemukan
    if (!$penilaian) {
        // Menghandle kasus ketika penilaian tidak ditemukan, bisa diarahkan ulang atau menampilkan pesan kesalahan
        return redirect()->route('penilaian.index')->with('error', 'Penilaian tidak ditemukan');
    }

    // Mengambil data tambahan yang mungkin dibutuhkan untuk tampilan
    // Contoh: $siswa = $penilaian->siswa;

    // Mengirim data penilaian ke tampilan
    return view('pages.plmitra.layouts.penilaian.show', compact('penilaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data penilaian berdasarkan ID
        $penilaian = NilaiMagang::find($id);

        // Memeriksa apakah penilaian ditemukan
        if (!$penilaian) {
            // Menghandle kasus ketika penilaian tidak ditemukan, bisa diarahkan ulang atau menampilkan pesan kesalahan
            return redirect()->route('penilaian.index')->with('error', 'Penilaian tidak ditemukan');
        }

        // Mengirim data penilaian ke tampilan edit
        return view('pages.plmitra.layouts.penilaian.edit', compact('penilaian'));
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
        // Validasi data dari formulir
        $request->validate([
            'nilai' => 'required|numeric', // Sesuaikan dengan aturan validasi yang dibutuhkan
            // Tambahkan aturan validasi untuk input lain sesuai kebutuhan
        ]);

        // Mengambil data penilaian berdasarkan ID
        $penilaian = NilaiMagang::find($id);

        // Memeriksa apakah penilaian ditemukan
        if (!$penilaian) {
            // Menghandle kasus ketika penilaian tidak ditemukan, bisa diarahkan ulang atau menampilkan pesan kesalahan
            return redirect()->route('penilaian.index')->with('error', 'Penilaian tidak ditemukan');
        }

        // Mengupdate data penilaian
        $penilaian->update([
            'nilai' => $request->input('nilai'),
            // Update atribut lain sesuai kebutuhan
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mengambil data penilaian berdasarkan ID
        $penilaian = NilaiMagang::find($id);

        // Memeriksa apakah penilaian ditemukan
        if (!$penilaian) {
            // Menghandle kasus ketika penilaian tidak ditemukan, bisa diarahkan ulang atau menampilkan pesan kesalahan
            return redirect()->route('penilaian.index')->with('error', 'Penilaian tidak ditemukan');
        }

        // Menghapus data penilaian
        $penilaian->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil dihapus');
    }
}
