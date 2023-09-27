<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Prodi;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'kurikulums' => Kurikulum::all()
        ];

        return view('pages.prodi.data-kurikulum1', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kurikulum'=> Kurikulum::all(),
            'prodi' => Prodi::all(),
            'action' => route('daftar.kurikulum.store')
        ];
        return view('pages.prodi.form-data-kurikulum', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = [
            'create_nama' => ['required, string, max:255'],
            'create_status' => ['required'],
            'create_prodi' => ['required']
        ];

        Kurikulum::create([
            'nama' => $validated['create_nama'],
            'status' => $validated['create_status'],
            'id_prodi' => $validated['create_prodi'],
        ]);

        return redirect()->route('daftar.kurikulum.index');
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
