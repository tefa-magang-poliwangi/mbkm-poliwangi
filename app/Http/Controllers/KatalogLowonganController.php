<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class KatalogLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id) {
            // Jika ada ID mitra yang diberikan, cek apakah ID tersebut ada di tabel Mitra
            $mitra = Mitra::find($id);

            if (!$mitra) {
                // Jika ID tidak ada dalam tabel Mitra, ambil data mitra secara acak
                $mitra = Mitra::inRandomOrder()->first();
            }
        } else {
            // Jika tidak ada ID mitra yang diberikan, ambil data mitra secara acak
            $mitra = Mitra::inRandomOrder()->first();
        }

        $mitras = Mitra::all();

        $data = [
            'mitra' => $mitra,
            'mitras' => $mitras,
        ];

        return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-daftar-program', $data);
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
