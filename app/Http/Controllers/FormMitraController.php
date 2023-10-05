<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class FormMitraController extends Controller
{
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
        $data = [
            'formmitra' => Mitra::all()
        ];

        return view('pages.mitra.manajemen-mitra.mitra-form', $data);
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
            'nama_perusahaan' => ['required', 'string'],
            'alamat_perusahaan' => ['required', 'string'],
            'cities' => ['required'],
            'provinces' => ['required'],
            'website' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required','email'],
            'file' => ['required','mimes:pdf', 'max:2048'],
        ]);

        $saveData = [];

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $saveData['file'] = $uploadedFile->store('public/mitra/profile');
        }

        Mitra::create([
            'nama' => $validated['nama_perusahaan'],
            'alamat' => $validated['alamat_perusahaan'],
            'kota' => $validated['cities'],
            'provinsi' => $validated['provinces'],
            'website' => $validated['website'],
            'narahubung' => $validated['no_telp'],
            'email' => $validated['email'],
            'file' => isset($saveData['file']) ? $saveData['file'] : null,
        ]);

        return redirect()->route('formulir.mitra.page');
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
