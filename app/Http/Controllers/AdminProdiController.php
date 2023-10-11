<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;




class AdminProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'users' => User::all(),
            'admins' => AdminProdi::all(),
            'prodi' => Prodi::all()
        ];

        return view('pages.admin.manajemen-admin-prodi.data-admin-prodi', $data);
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

            'create_user' => ['required'],
            'create_prodi' => ['required'],

        ]);

        AdminProdi::create([
            'id_user' => $validated['create_user'],
            'id_prodi' => $validated['create_prodi']
        ]);


        Alert::success('Succes', 'Data Admin Prodi Berhasil Ditambahkan');
        return redirect()->route('data.admin.index');
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

        $adminprodi = AdminProdi::findOrFail($id);
        $adminprodi->delete();

        Alert::success('Success', 'User Admin Prodi Berhasil Dihapus');

        return redirect()->route('data.admin.index');

    }
}
