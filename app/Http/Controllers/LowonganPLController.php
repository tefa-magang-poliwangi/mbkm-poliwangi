<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\LowonganPLMitra;
use App\Models\ProgramMagang;
use Illuminate\Http\Request;

class LowonganPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data dari model 'NamaModel'
        $lowonganMitras = Lowongan::all(); // Misalnya, mengambil semua data

        // Mengirimkan data ke tampilan
        return view('pages.plmitra.layouts.LowonganPLMitra.index', compact('lowonganMitras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show($id_lowongan)
    {
        // Mengambil data lowongan berdasarkan ID
        $data = [
            'programmagang' => ProgramMagang::where('id_lowongan', $id_lowongan)->get(),
            'id_lowongan' => $id_lowongan,
            'lowongan' => Lowongan::findOrFail($id_lowongan),
        ];

        return view('pages.plmitra.layouts.LowonganPLMitra.show',$data);
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
