<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswasImport;
use Illuminate\Http\Request;
use App\Imports\UserMahasiswasImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function import_data_user_mahasiswa(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new UserMahasiswasImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            Alert::success('Success', 'Data Berhasil Di Import');
            return redirect()->back();
        } else {
            //redirect
            Alert::error('Error', 'Data Berhasil Di Import');
            return redirect()->back();
        }
    }

    public function import_data_mahasiswa(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new MahasiswasImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            Alert::success('Success', 'Data Berhasil Di Import');
            return redirect()->back();
        } else {
            //redirect
            Alert::error('Error', 'Data Berhasil Di Import');
            return redirect()->back();
        }
    }
}
