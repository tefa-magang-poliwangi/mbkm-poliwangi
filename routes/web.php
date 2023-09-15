<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/dashboard-user/profile', function () {
    return view('pages.profile.profile-user');
});

Route::get('/form-uploud-transkip', function () {
    return view('pages.form-uploud.form-uploud-transkip');
});
Route::get('/dashboard-user/kegiatan', function () {
    return view('pages.kegiatan.kegiatan-user');
});
Route::get('/dashboard-user/kegiatan-login', function () {
    return view('pages.kegiatan.kegiatan-user-login');
});
Route::get('/dashboard-user/kegiatan-lolos', function () {
    return view('pages.kegiatan.kegiatan-lolos');
});
Route::get('/dashboard-user/kegiatan-tidak-lolos', function () {
    return view('pages.kegiatan.kegiatan-tidak-lolos');
});

Route::get('/dashboard-dosbim', function () {
    return view('pages.dosen.dashboard-dosbim');
});
Route::get('/dashboard-user/profile/edit-password', function () {
    return view('pages.password.password-user');
});

Route::get('/dashboard-user/mitra', function () {
    return view('pages.mitra.mitra');
});
Route::get('/dashboard-user/rincian-kegiatan', function () {
    return view('pages.rincian-kegiatan.rincian-kegiatan');
});
Route::get('/dashboard-user/form-mitra', function () {
    return view('pages.mitra.form-mitra');
});

Route::get('/daftar-nilai', function () {
    return view('pages.form-uploud.daftar-nilai');
});

Route::get('/form-uploud-transkip', function () {
    return view('pages.form-uploud.form-uploud-transkip');
});

Route::get('/dashboard-mitra', function () {
    return view('pages.mitra.dashboard-mitra');
});

Route::get('/mitra-lowongan', function () {
    return view('pages.mitra.mitra-lowongan');
});
