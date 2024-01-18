<?php

namespace App\Http\Controllers;

use App\Models\JenisProgram;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class JenisProgramController extends Controller
{
    public function index() {
        $data = [
            'jenis_program' => JenisProgram::all()
        ];

        return view('pages.jenis-program.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'create_nama_program' => ['required', 'string'],
        ]);

        JenisProgram::create([
            'nama_program' => $validated['create_nama_program'],

        ]);

        Alert::success('Success', 'Data Jenis Program Berhasil Ditambahkan');

        return redirect()->route('manajemen.jenis-program.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'update_nama_program' => ['required'],
        ]);

        JenisProgram::where('id', $id)->update([
            'nama_program' => $validated['update_nama_program'],
        ]);

        Alert::success('Success', 'Data Jenis Program Berhasil Diupdate');

        return redirect()->route('manajemen.jenis-program.index');
    }

    public function destroy($id)
    {
        $jenis_program = JenisProgram::findOrFail($id);
        $jenis_program->delete();

        Alert::success('Success', 'Data Jenis Program Berhasil Dihapus');

        return redirect()->route('manajemen.jenis-program.index');
    }


}