<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// landing page route
Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');

// Auth route
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-admin', [AdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');
    Route::get('/dashboard-user', [UserPageController::class, 'dashboard_user'])->name('dashboard.user.page');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login.page');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');
});

// tes (yang buat halaman baru tambahkan dibawah, jangan diatas)

//Halaman user eksternal
Route::get('/dashboard-user/profile', function () {
    return view('pages.user.profile.profile-user');
});
Route::get('/dashboard-user/profile/edit-password', function () {
    return view('pages.user.profile.edit-password-user');
});
Route::get('/form-uploud-transkip', function () {
    return view('pages.user.transkrip-nilai.form-uploud-transkip-user');
});
Route::get('/daftar-nilai', function () {
    return view('pages.user.transkrip-nilai.daftarNilai-user');
});

//Halaman User Internal
Route::get('/dashboard-dosbim', function () {
    return view('pages.dosen.dashboard-dosbim');
});


//halaman mitra
Route::get('/dashboard-user/mitra', function () {
    return view('pages.mitra.mitra');
});

Route::get('/dashboard-user/form-mitra', function () {
    return view('pages.mitra.form-mitra');
});

//Halaman Mitra
Route::get('/dashboard-mitra', function () {
    return view('pages.mitra.dashboard-mitra');
});

Route::get('/mitra-lowongan', function () {
    return view('pages.mitra.mitra-lowongan');
});

// halaman user
Route::get('/dashboard-user/lolos-pendaftaran', function () {
    return view('pages.user.pendaftaran-mahasiswa.lolosPendaftaran-user');
});
Route::get('/dashboard-user/pendaftaran-magang', function () {
    return view('pages.user.pendaftaran-mahasiswa.pendaftaranMagang-user');
});
Route::get('/dashboard-user/rincian-kegiatan', function () {
    return view('pages.user.pendaftaran-mahasiswa.rincianKegiatan-user');
});
Route::get('/dashboard-user/status-pendaftaran', function () {
    return view('pages.user.pendaftaran-mahasiswa.statusPendaftaran-user');
});
Route::get('/dashboard-user/tidak-lolos-pendaftaran', function () {
    return view('pages.user.pendaftaran-mahasiswa.tidaklolosPendaftaran-user');
});

//Kaprodi
Route::get('/dashboard-user/kegiatan', function () {
    return view('pages.kaprodi.rincian-kegiatan.rincianKegiatan-Kaprodi');
});

//Halaman Dosbim
Route::get('/dashboard-dosbim', function () {
    return view('pages.dosen.dashboard-dosbim');
});

//Halaman Doswal
Route::get('/dashboard-doswal', function () {
    return view('pages.dosen-wali.dashboard-doswal');
});
Route::get('/dashboard/kelayakan-doswal', function () {
    return view('pages.dosen-wali.kelayakan-doswal');
});
Route::get('/dashboard/transkrip/daftarNilai', function () {
    return view('pages.dosen-wali.transkrip-doswal.daftar-mahasiswa');
});
Route::get('/dashboard/transkrip/konversiNilai', function () {
    return view('pages.dosen-wali.transkrip-doswal.konversi-nilai');
});
route::get('/dashboard/transkrip/konversiNilai', function(){
return view('pages.dosen-wali.transkrip-doswal.konversi-nilai');
});