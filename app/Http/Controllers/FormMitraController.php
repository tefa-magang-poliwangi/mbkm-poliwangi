<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\SektorIndustri;
use Illuminate\Validation\Rules;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use RealRashid\SweetAlert\Facades\Alert;

class FormMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'mitras' => Mitra::all(),
            'sektor_industri' => SektorIndustri::all(),
            'kategori' => Kategori::all(),
            'city' => City::all(),
        ];

        return view('pages.mitra.manajemen-pelamar-mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $formmitra = Mitra::all();
            $sektor_industri = SektorIndustri::all();
            $kategori = Kategori::all();

            $dropdown = new DependantDropdownController();
            $provinces = $dropdown->provinces();
            $cities = $dropdown->cities();

        return view('pages.mitra.manajemen-pelamar-mitra.create', compact('formmitra', 'sektor_industri', 'kategori', 'provinces', 'cities'));
    }

    public function getCities($provinceId)
{
    // Cari dulu code provinsi berdasarkan id provinsi
    $province = Province::find($provinceId);

    if (!$province) {
        // Jika provinsi tidak ditemukan, return kosong
        return response()->json([]);
    }

    // Ambil kode provinsi
    $provinceCode = $province->code;

    // Cari kota yang punya province_code sesuai code provinsi tadi
    $cities = City::where('province_code', $provinceCode)->get();

    return response()->json($cities);
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
            'nama' => ['required', 'string'],
            'id_sektor_industri' => ['required'],
            'id_kategori' => ['required'],
            'alamat' => ['required', 'string'],
            'provinces' => ['required'],
            'cities' => ['required'],
            'website' => ['required', 'url'],
            'narahubung' => ['required', 'string', 'between:11,15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
            'status' => ['required'],
            'deskripsi' => ['required'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',

            'id_sektor_industri.required' => 'Sektor industri wajib dipilih.',

            'id_kategori.required' => 'Kategori wajib dipilih.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'provinces.required' => 'Provinsi wajib dipilih.',
            'cities.required' => 'Kota/Kabupaten wajib dipilih.',

            'website.required' => 'Website wajib diisi.',
            'website.url' => 'Format website tidak valid. Harus berupa URL yang benar (misal: https://contoh.com).',

            'narahubung.required' => 'Narahubung wajib diisi.',
            'narahubung.string' => 'Narahubung harus berupa teks.',
            'narahubung.between' => 'Narahubung harus terdiri dari 11 sampai 15 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',

            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',

            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter.',
            
            'status.required' => 'Status wajib dipilih.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);

        $user_mitra = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user_mitra->assignRole('mitra');

        $saveData = [];

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $saveData['file'] = $uploadedFile->store('public/mitra/profile');
        }

        Mitra::create([
            'nama' => $validated['nama'],
            'id_sektor_industri' => $validated['id_sektor_industri'],
            'id_kategori' => $validated['id_kategori'],
            'alamat' => $validated['alamat'],
            'provinsi' => $validated['provinces'],
            'kota' => $validated['cities'],
            'website' => $validated['website'],
            'narahubung' => $validated['narahubung'],
            'email' => $validated['email'],
            'password_confirmation' => $validated['password_confirmation'],
            'status' => $validated['status'],
            'id_user' => $user_mitra->id,
            'deskripsi' => $validated['deskripsi'],
        ]);

        Alert::success('Success', 'Mitra Berhasil Ditambahkan');

        return redirect()->route('manajemen.mitra.index');
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
        $sektor_industri = SektorIndustri::all();
        $kategori = Kategori::all();
        $mitra = Mitra::findOrFail($id);
        

        $dropdown = new DependantDropdownController();
            $provinces = $dropdown->provinces();
            $cities = $dropdown->cities();

        return view('pages.mitra.manajemen-pelamar-mitra.update', compact('sektor_industri', 'kategori', 'mitra', 'provinces', 'cities'));
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
        $mitra = Mitra::findOrFail($id);

        $validated = $request->validate([
            'update_nama' => ['required', 'string'],
            'update_sektor_industri' => ['required'],
            'update_kategori' => ['required'],
            'update_alamat' => ['required', 'string'],
            'provinces' => ['required'],
            'cities' => ['required'],
            'update_link_website' => ['required', 'url'],
            'update_no_telephone' => ['required', 'string', 'between:11,15'],
            'update_email' => ['required', 'email'],
            'update_status' => ['required'],
            'deskripsi' => ['required'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',

            'id_sektor_industri.required' => 'Sektor industri wajib dipilih.',

            'id_kategori.required' => 'Kategori wajib dipilih.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'provinces.required' => 'Provinsi wajib dipilih.',
            'cities.required' => 'Kota/Kabupaten wajib dipilih.',

            'website.required' => 'Website wajib diisi.',
            'website.url' => 'Format website tidak valid. Harus berupa URL yang benar (misal: https://contoh.com).',

            'narahubung.required' => 'Narahubung wajib diisi.',
            'narahubung.string' => 'Narahubung harus berupa teks.',
            'narahubung.between' => 'Narahubung harus terdiri dari 11 sampai 15 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',

            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',

            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter.',
            
            'status.required' => 'Status wajib dipilih.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);

        // Menggunakan array kosong untuk $saveData sebagai awalan
        $saveData = [];

        // Pengecekan apakah ada input password
        if (!empty($request->input('password'))) {
            // Hash password
            $saveData['password'] = bcrypt($request->input('password'));
        }

        $user = User::findOrFail($mitra->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['update_nama'],
            'email' => $validated['update_email'],
            'username' => $validated['update_email'],
        ]);

        // Jika ada password baru, update password
        if (isset($saveData['password'])) {
            $user->update(['password' => $saveData['password']]);
        }

        Mitra::where('id', $mitra->id)->update([
            'nama' => $validated['update_nama'],
            'id_sektor_industri' => $validated['update_sektor_industri'],
            'id_kategori' => $validated['update_kategori'],
            'alamat' => $validated['update_alamat'],
            'provinsi' => $validated['provinces'],
            'kota' => $validated['cities'],
            'website' => $validated['update_link_website'],
            'narahubung' => $validated['update_no_telephone'],
            'email' => $validated['update_email'],
            'status' => $validated['update_status'],
            'id_user' => $user->id,
            'deskripsi' => $validated['deskripsi'],
        ]);

        Alert::success('Success', 'Mitra Berhasil Diupdate');

        return redirect()->route('manajemen.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $user = User::findOrFail($mitra->id_user);
        $user->delete();
        $mitra->delete();

        Alert::success('Success', 'Mitra Berhasil Dihapus');

        return redirect()->route('manajemen.mitra.index');
    }
}
