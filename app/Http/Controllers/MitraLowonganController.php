<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MitraLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $mitra = Mitra::where('id_user', $user_id)->first();

        $data = [
            'lowongans' => Lowongan::where('id_mitra', $mitra->id)->get(),
            'prodi' => Prodi::all()
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
            'lowongans' => Lowongan::all(),
            'prodi' => Prodi::all()
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
        $mitra = Mitra::where('id_user', Auth::user()->id)->first();

        $validated = $request->validate([
            'nama' => ['required'],
            'jumlah_lowongan' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'tanggal_dibuka' => ['required', 'date'],
            'tanggal_ditutup' => ['required', 'date'],
            'tanggal_magang_dimulai' => ['required', 'date'],
            'tanggal_magang_berakhir' => ['required', 'date'],
            'status' => ['required'],
            'id_prodi' => ['required']
        ], [
            'nama.required' => 'Nama lowongan wajib diisi.',
            'jumlah_lowongan.required' => 'Jumlah lowongan wajib diisi.',
            'jumlah_lowongan.numeric' => 'Jumlah lowongan harus berupa angka.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'tanggal_dibuka.required' => 'Tanggal dibuka wajib diisi.',
            'tanggal_dibuka.date' => 'Format tanggal dibuka tidak valid.',
            'tanggal_ditutup.required' => 'Tanggal ditutup wajib diisi.',
            'tanggal_ditutup.date' => 'Format tanggal ditutup tidak valid.',
            'tanggal_magang_dimulai.required' => 'Tanggal magang dimulai wajib diisi.',
            'tanggal_magang_dimulai.date' => 'Format tanggal magang dimulai tidak valid.',
            'tanggal_magang_berakhir.required' => 'Tanggal magang berakhir wajib diisi.',
            'tanggal_magang_berakhir.date' => 'Format tanggal magang berakhir tidak valid.',
            'status.required' => 'Status wajib diisi.',
            'id_prodi.required' => 'Program studi wajib dipilih.'
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
            'id_mitra' => $mitra->id,
            'id_prodi' => $validated['id_prodi']
        ]);

        Alert::success('Success', 'Lowongan Mitra Berhasil Ditambahkan');

        return redirect()->route('manajemen.lowongan.mitra.index');
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
            'lowongan' => Lowongan::findOrFail($id),
            'id_mitra' => Mitra::all(),
            'prodi' => Prodi::all()
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
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'jumlah_lowongan' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'tanggal_dibuka' => ['required', 'date'],
            'tanggal_ditutup' => ['required', 'date'],
            'tanggal_magang_dimulai' => ['required', 'date'],
            'tanggal_magang_berakhir' => ['required', 'date'],
            'status' => ['required'],
            'id_prodi' => ['required']
        ]);

        Lowongan::where('id', $id)->update([
            'nama' => $validated['nama'],
            'jumlah_lowongan' => $validated['jumlah_lowongan'],
            'deskripsi' => $validated['deskripsi'],
            'tanggal_dibuka' => $validated['tanggal_dibuka'],
            'tanggal_ditutup' => $validated['tanggal_ditutup'],
            'tanggal_magang_dimulai' => $validated['tanggal_magang_dimulai'],
            'tanggal_magang_berakhir' => $validated['tanggal_magang_berakhir'],
            'status' => $validated['status'],
            'id_prodi' => $validated['id_prodi']
        ]);

        Alert::success('Success', 'Lowongan Mitra Berhasil Diupdate');

        return redirect()->route('manajemen.lowongan.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        Alert::success('Success', 'Lowongan Mitra Berhasil Dihapus');

        return redirect()->route('manajemen.lowongan.mitra.index');
    }
}
