<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\Mahasiswa;
use App\Models\NilaiMagangExt;
use App\Models\Periode;
use Illuminate\Http\Request;

class UploadTranskripNilai extends Controller
{

    public function get_mahasiswa($id_mahasiswa)
    {
        try {
            $mahasiwa = Mahasiswa::findOrFail($id_mahasiswa);
            return $mahasiwa;
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan pesan kesalahan dalam format JSON
            return response()->json(['error' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function upload_transkrip_nilai_mahasiswa_external(Request $request, $id_mahasiswa, $id_magang_ext, $id_periode)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);
            $magang_ext = MagangExt::findOrFail($id_magang_ext);
            $periode = Periode::findOrFail($id_periode);

            $validated = $request->validate([
                'file' => ['required', 'mimes:pdf', 'max:1024'],
            ]);

            $saveData = [];

            // Mengecek apakah field untuk upload file sudah di-upload atau belum
            if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $saveData['file'] = $uploadedFile->store('public/transkip-nilai-external');
            }

            NilaiMagangExt::create([
                'file' => isset($saveData['file']) ? $saveData['file'] : null,
                'semester' => $periode->semester,
                'id_mahasiswa' => $mahasiswa->id,
                'id_magang_ext' => $magang_ext->id,
                'id_periode' => $periode->id,
            ]);

            // Jika semuanya berhasil, kembalikan respons sukses
            $response = [
                'status' => 'success',
                'message' => 'File berhasil diunggah dan Sukses Menambahkan Data Nilai Magang External',
                'data' => [
                    'request' => $request->toArray(),
                    'mahasiswa' => $mahasiswa->toArray(),
                    'magang_ext' => $magang_ext->toArray(),
                    'periode' => $periode->toArray(),
                ],
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan pesan kesalahan dalam format JSON
            return response()->json(['error' => $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
