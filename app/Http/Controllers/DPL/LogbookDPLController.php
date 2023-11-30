<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use App\Models\Logbook;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Models\KomentarLogbook;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LogbookDPLController extends Controller
{
    public function index()
    {
        $pelamarMagangsDiterima = PelamarMagang::with(['mahasiswa', 'lowongan', 'pendampingLapangMahasiswa.dosen_pl.dosen'])
            ->where('status_diterima', 'Aktif')
            ->get();

        return view('pages.dosen.pages-dpl.daftar-logbook-mhs.index', [
            'pelamarMagangs' => $pelamarMagangsDiterima,

        ]);
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('users', 'name')],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'username' =>  ['required', 'string', Rule::unique('users', 'username')],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->password = hash::make($request->password);
        $user->save();

        Alert::success('Success', 'User created successfully');

        return redirect()->route('daftar-logbook-mhs.index');
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        // Assuming 'id_mahasiswa' is the foreign key in the logbooks table
        $logbooks = Logbook::where('id_mahasiswa', $id)->get();
        foreach ($logbooks as $logbook) {
            $logbook->komentar = $logbook->komentar_logbooks->first();
        }

        return view('pages.dosen.pages-dpl.daftar-logbook-mhs.show', compact('user', 'logbooks'));
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
    }


    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    }

    public function storeKomentar(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nilai' => 'required|integer',
            'id_pendamping_lapang_mahasiswa' => 'required|exists:pendamping_lapang_mahasiswas,id',
            'id_logbook' => 'required|exists:logbooks,id',
        ]);

        KomentarLogbook::create([
            'komentar' => $request->input('komentar'),
            'tanggal' => $request->input('tanggal'),
            'nilai' => $request->input('nilai'),
            'id_pendamping_lapang_mahasiswa' => $request->input('id_pendamping_lapang_mahasiswa'),
            'id_logbook' => $request->input('id_logbook'),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }

    public function updateKomentar(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required|string|max:255',
        ]);

        $komentar = KomentarLogbook::findOrFail($id);
        $komentar->update([
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui.');
    }
}