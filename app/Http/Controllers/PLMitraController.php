<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\PlMitra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class PLMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'plmitra'=>PlMitra::all(),
            'mitra' => Mitra::all(),        ];
        return view('pages.mitra.pl-mitra', $data);
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
            'nama'=>'required|string',
            'no_telp'=>'required|string',
            'email'=>'required|email',
            'mitra'=>'required|string',
            'username'=>'required|string',
            'password'=>['required','confirmed', 'min:8'],
            'password_confirmation'=>['required','min:8', Rules\Password::defaults()],
        ]);

        $user_mitra = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),

        ]);

        $user_mitra->assignRole('plmitra');

        PlMitra::create([
            'nama' => $validated['nama'],
            'no_telp' => $validated['no_telp'],
            'email' => $validated['email'],
            'id_mitra' => $validated['mitra'],
            'id_user' => $user_mitra->id,
        ]);

        $credentials = [
            'username' => $user_mitra->username,
            'password' => $validated['password'],
        ];

        // if (Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->route('data.plmitra.index');
        // }
         return redirect()->route('data.plmitra.index');


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
        $plmitra = PlMitra::findOrFail($id);
        $plmitra->delete();

        return redirect()->route('data.periode.index');
    }
}
