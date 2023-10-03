<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\Mahasiswa;
use App\Models\NilaiMagangExt;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UploadTranskripNilai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'nilaimagangext' => NilaiMagangExt::all(),
            'mahasiswa' => Mahasiswa::all(),
            'periode' => Periode::all(),
            'magangext' => MagangExt::all()
        ];

        return view('pages.mahasiswa.transkrip-nilai-mahasiswa.mahasiswa-form-upload-transkrip', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_user)
    {
        if (Auth::user()->id != $id_user) {
            return redirect()->back();
        }

        $user_mahasiswa = User::findOrFail($id_user)->mahasiswa;
        $mahasiswa = Mahasiswa::findOrFail($user_mahasiswa->first()->id);

        $data = [
            'transkrip_mahasiswa' => NilaiMagangExt::where('id_mahasiswa', $mahasiswa->id)->get(),
            'mahasiswa' => $mahasiswa,
            'periode' => Periode::all(),
            'magangext' => MagangExt::all()
        ];

        return view('pages.mahasiswa.transkrip-nilai-mahasiswa.mahasiswa-form-upload-transkrip', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_user)
    {
        $mahasiswa = User::findOrFail($id_user)->mahasiswa;
        $validated = $request->validate([
            'file_transkrip' => ['required', 'mimes:pdf', 'max:1024'],
            'file_sertifikat' => ['required', 'mimes:pdf', 'max:2048'],
            'magang_eksternal' => ['required'],
            'periode' => ['required'],
        ]);

        $saveData = [];

        // Mengecek apakah field untuk upload file sudah di-upload atau belum
        if ($request->hasFile('file_transkrip')) {
            $uploadedFile = $request->file('file_transkrip');
            $saveData['file_transkrip'] = $uploadedFile->store('public/mahasiswa/mbkm-external/transkip-nilai');
        }

        if ($request->hasFile('file_sertifikat')) {
            $uploadedFile = $request->file('file_sertifikat');
            $saveData['file_sertifikat'] = $uploadedFile->store('public/mahasiswa/mbkm-external/sertifikat');
        }

        NilaiMagangExt::create([
            'file_transkrip' => isset($saveData['file_transkrip']) ? $saveData['file_transkrip'] : null,
            'file_sertifikat' => isset($saveData['file_sertifikat']) ? $saveData['file_sertifikat'] : null,
            'id_mahasiswa' => $mahasiswa->first()->id,
            'id_magang_ext' => $validated['magang_eksternal'],
            'id_periode' => $validated['periode'],
        ]);

        Alert::success('Success', 'Berkas transkrip berhasil di unggah');

        return redirect()->route('upload-transkrip-mahasiswa.create', $id_user);
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
        $nilaimagangext = NilaiMagangExt::findOrFail($id);

        if ($nilaimagangext->file_transkrip != null) {
            Storage::delete($nilaimagangext->file_transkrip);
        }

        if ($nilaimagangext->file_sertifikat != null) {
            Storage::delete($nilaimagangext->file_sertifikat);
        }

        $nilaimagangext->delete();

        Alert::success('Success', 'Berkas transkrip berhasil di hapus');

        return redirect()->route('upload-transkrip-mahasiswa.create', $id);
    }
}
