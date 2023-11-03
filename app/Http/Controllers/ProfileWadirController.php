<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileWadirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != Auth::user()->id) {
            return redirect()->back();
        }

        $data = [
            'user' => User::findOrFail($id),
        ];

        return view('pages.wadir.profil-wadir.wadir-profil', $data);
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
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        // Menggunakan array kosong untuk $saveData sebagai awalan
        $saveData = [];

        // Pengecekan apakah ada input password
        if (!empty($request->input('password'))) {
            // Hash password
            $saveData['password'] = bcrypt($request->input('password'));
        }

        $user = User::findOrFail($id);

        User::where('id', $id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
        ]);

        // Jika ada password baru, update password
        if (isset($saveData['password'])) {
            $user->update(['password' => $saveData['password']]);
        }

        Alert::success('Success', 'Profil Berhasil Diubah');

        return redirect()->back();
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
