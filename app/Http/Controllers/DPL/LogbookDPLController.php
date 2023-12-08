<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use App\Models\DosenPL;
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
use App\Models\Dosen;
use RealRashid\SweetAlert\Facades\Alert;

class LogbookDPLController extends Controller
{

    public function index()
    {
        $dosen = Dosen::where('id_user', auth()->id())->first();
        $dosenPl = DosenPL::where('id_dosen', $dosen->id)->first();

        if (!$dosenPl) {
            // Handle the case where DosenPL is not found for the authenticated user
            abort(404, 'DosenPL not found for the authenticated user.');
        }


        $id_dosen_pl = $dosenPl->id;
        // dd($id_dosen_pl);

        $pelamarMagangsDiterima = PelamarMagang::select('dosens.nama AS nama_dosen', 'pelamar_magangs.*')
            ->join('pendamping_lapang_mahasiswas AS plm', 'plm.id_pelamar_magang', 'pelamar_magangs.id')
            ->join('dosen_p_l_s AS dpl', 'dpl.id', 'plm.id_dosen_pl')
            ->join('dosens', 'dosens.id', 'dpl.id_dosen')
            ->where('status_diterima', 'Aktif')
            ->where('plm.id_dosen_pl', $id_dosen_pl)
            ->whereHas('pendampingLapangMahasiswa.dosen_pl', function ($query) use ($id_dosen_pl) {
                $query->where('id', $id_dosen_pl);
            })
            ->get();

        return view('dosen.pages-dpl.daftar-logbook-mhs.index', [
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
    public function show($id_pelamar_magang)
    {
        // Assuming PelamarMagang model is used
        $pelamarMagang = PelamarMagang::findOrFail($id_pelamar_magang);

        // Extracting user and mahasiswa from PelamarMagang
        $user = $pelamarMagang->mahasiswa->user;
        $mahasiswa = $pelamarMagang->mahasiswa;

        // Assuming 'id_mahasiswa' is the foreign key in the logbooks table
        $logbooks = Logbook::where('id_mahasiswa', $id_pelamar_magang)->get();

        foreach ($logbooks as $logbook) {
            $logbook->komentar = $logbook->komentar_logbooks->first();
        }

        return view('dosen.pages-dpl.daftar-logbook-mhs.show', compact('user', 'logbooks'));
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
