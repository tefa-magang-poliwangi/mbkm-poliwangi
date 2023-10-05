<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'periode' => Periode::all(),
        ];

        return view('pages.prodi.Periode.index', $data);
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
        // dd($request);
        $validated = $request->validate([
            'create_semester' => ['required'],
            'create_tahun' => ['required'],
            'create_status' => ['required'],
        ]);

        Periode::create([
            'semester' => $validated['create_semester'],
            'tahun' => $validated['create_tahun'],
            'status' => $validated['create_status'],
        ]);

        return redirect()->route('data.periode.index');
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
            'update_semester' => ['required'],
            'update_tahun' => ['required'],
            'update_status' => ['required'],
        ]);

        Periode::where('id', $id)->update([
            'semester' => $validated['update_semester'],
            'tahun' => $validated['update_tahun'],
            'status' => $validated['update_status'],
        ]);

        return redirect()->route('data.periode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return redirect()->route('data.periode.index');
    }
}
