<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersWithAdminProdiRoles = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin-jurusan');
        })->whereDoesntHave('admin_jurusan')->get();

        $data = [
            'user_option' => $usersWithAdminProdiRoles,
            'admins' => AdminJurusan::all(),
            'jurusan' => Jurusan::all()
        ];

        return view('pages.admin.manajemen-admin-jurusan.data-admin-jurusan', $data);
    }

    public function downloadTemplate()
    {
        $filePath = storage_path('app/public/template/Data User Admin.xlsx'); // path file Excel kamu
        $fileName = 'template-data-admin.xlsx';

        return response()->download($filePath, $fileName);
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
            'create_jurusan' => ['required'],

        ]);

        AdminJurusan::create([
            'id_user' => $validated['create_user'],
            'id_jurusan' => $validated['create_jurusan']
        ]);

        Alert::success('Succes', 'Data Admin Jurusan Berhasil Ditambahkan');

        return redirect()->route('manajemen.admin.jurusan.index');
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
        $admin_jurusan = AdminJurusan::findOrFail($id);
        $admin_jurusan->delete();

        Alert::success('Success', 'User Admin Jurusan Berhasil Dihapus');

        return redirect()->route('manajemen.admin.jurusan.index');
    }
}
