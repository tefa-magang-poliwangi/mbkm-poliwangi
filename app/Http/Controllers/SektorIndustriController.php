<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SektorIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = [
            'sektorindustri' => SektorIndustri::all(),
        ];
        return view ('pages.admin.manajemen-sektor-industri.sektor-industri', $data);
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
        $validated = $request->validate([
            'create_nama' => ['required'],
        ]);

        SektorIndustri::create([
            'nama' => $validated['create_nama'],
        ]);

        Alert::success('Success', 'Data Sektor Industri Berhasil Ditambahkan');

        return redirect()->route('data.sektor_industri.index');
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
        $validated = $request->validate([
            'update_nama' => ['required'],
        ]);

        SektorIndustri::where('id', $id)->update([
            'nama' => $validated['update_nama'],
        ]);

        Alert::success('Success', 'Data Sektor Industri Berhasil Diupdate');

        return redirect()->route('data.sektor_industri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sektorindustri = SektorIndustri::findOrFail($id);
        $sektorindustri->delete();

        Alert::success('Success', 'Data Sektor Industri Berhasil Dihapus');

        return redirect()->route('data.sektor_industri.index');
    }
}