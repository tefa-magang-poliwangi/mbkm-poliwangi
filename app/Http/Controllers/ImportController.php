<?php

namespace App\Http\Controllers;

use App\Imports\AdminProdiImport;
use App\Imports\DataMahasiswaImport;
use App\Imports\DosenImport;
use App\Imports\KriteriaMagangExt;
use App\Imports\MagangExtImport;
use App\Imports\MatakuliahImport;
use App\Imports\NilaiKriteriaKm;
use App\Imports\PesertaKmImport;
use App\Imports\UserMahasiswaImport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function import_data_user_admin_prodi(Request $request)
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
        $import = Excel::import(new AdminProdiImport(), storage_path('app/public/excel/' . $nama_file));

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

    public function import_data_user_dosen(Request $request)
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
        $import = Excel::import(new DosenImport(), storage_path('app/public/excel/' . $nama_file));

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

    public function import_user_mahasiswa(Request $request)
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
        $import = Excel::import(new UserMahasiswaImport(), storage_path('app/public/excel/' . $nama_file));

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
        $import = Excel::import(new DataMahasiswaImport(), storage_path('app/public/excel/' . $nama_file));

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

    public function import_data_matakuliah(Request $request)
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
        $import = Excel::import(new MatakuliahImport(), storage_path('app/public/excel/' . $nama_file));

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

    public function import_data_magang_ext(Request $request)
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
        $import = Excel::import(new MagangExtImport(), storage_path('app/public/excel/' . $nama_file));

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

    public function import_data_kriteria_magang_ext(Request $request)
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
        $import = Excel::import(new KriteriaMagangExt(), storage_path('app/public/excel/' . $nama_file));

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

    // import data Kampus Mengajar
    public function import_data_nilai_kriteria_km(Request $request, $id_magang_ext)
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
        $import = Excel::import(new NilaiKriteriaKm($id_magang_ext), storage_path('app/public/excel/' . $nama_file));

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

    public function import_peserta_km(Request $request)
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
        $import = Excel::import(new PesertaKmImport(), storage_path('app/public/excel/' . $nama_file));

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
