<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KonversiNilaiExternal;
use App\Http\Controllers\KonversiNilaiInternal;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UploadTranskripNilai;
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

// route backend testing (postman)
Route::get('/get-detail-mahasiswa/{id_mahasiswa}', [UploadTranskripNilai::class, 'get_mahasiswa'])->name('get.mahasiswa');
Route::post('/upload-transkrip-nilai-mahasiswa-external/{id_mahasiswa}/{id_magang_ext}/{id_periode}/create', [UploadTranskripNilai::class, 'upload_transkrip_nilai_mahasiswa_external'])->name('upload_transkrip_nilai.mahasiswa.external');

Route::post('/konversi-nilai/mahasiswa-external/{id_mahasiswa}/{id_matkul}/{id_nilai_magang_ext}/create', [KonversiNilaiExternal::class, 'konversi_nilai_external'])->name('konversi_nilai.mahasiswa.external');
Route::post('/konversi-nilai/mahasiswa-internal/{id_mahasiswa}/{id_matkul}/{id_lowongan}/create', [KonversiNilaiInternal::class, 'konversi_nilai_nilai'])->name('konversi_nilai.mahasiswa.internal');

//Halaman admin user (mahasiswa) - Eksternal
Route::get('/dashboard-user/profile', function () {
    return view('pages.user.profile.profile-user');
});
Route::get('/form-upload-transkip', function () {
    return view('pages.user.transkrip-nilai.form-upload-transkrip-user');
});

// halaman admin user (mahasiswa) - internal
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

//Halaman admin Mitra
Route::get('/dashboard-mitra', function () {
    return view('pages.mitra.dashboard-mitra');
});
Route::get('/mitra-lowongan', function () {
    return view('pages.mitra.mitra-lowongan');
});
Route::get('/form-mitra', function () {
    return view('pages.mitra.form-mitra');
});
Route::get('/dashboard/daftar-pelamar', function () {
    return view('pages.mitra.daftar-pelamar');
});

//halaman admin Kaprodi

Route::get('/dashboard-kaprodi', function () {
    return view('pages.kaprodi.dashboard-kaprodi');
});
Route::get('/dashboard/rincian-kegiatan/daftar-mahasiswa', function () {
    return view('pages.kaprodi.rincian-kegiatan.daftarMahasiswa-kaprodi');
});
Route::get('/dashboard/rincian-kegiatan/daftar-mahasiswa/rincian-kegiatan', function () {
    return view('pages.kaprodi.rincian-kegiatan.rincianKegiatan-kaprodi');
});
Route::get('/dashboard/transkrip-nilai/daftar-mahasiswa', function () {
    return view('pages.kaprodi.transkrip-nilai.daftarMahasiswa-kaprodi');
});
Route::get('/dashboard/transkrip-nilai/daftar-mahasiswa/transkrip-nilai', function () {
    return view('pages.kaprodi.transkrip-nilai.transkripNilai-kaprodi');
});

//Halaman admin Dosen Pembimbing
Route::get('/dashboard-dosbim', function () {
    return view('pages.dosbim.dashboard-dosbim');
});
Route::get('/dashboard/laporan-harian', function () {
    return view('pages.dosbim.laporan-harian');
});
Route::get('/dashboard/laporan-mingguan', function () {
    return view('pages.dosbim.laporan-mingguan');
});
Route::get('/dashboard/laporan-akhir', function () {
    return view('pages.dosbim.laporan-akhir');
});

//Halaman admin Dosen wali
Route::get('/dashboard-dosen-wali', function () {
    return view('pages.dosen-wali.dashboard-doswal');
});
Route::get('/dashboard/kelayakan-dosen-wali', function () {
    return view('pages.dosen-wali.kelayakan-doswal');
});
Route::get('/dashboard/transkrip/daftar-nilai', function () {
    return view('pages.dosen-wali.transkrip-doswal.daftar-mahasiswa');
});
Route::get('/dashboard/transkrip/konversi-nilai', function () {
    return view('pages.dosen-wali.transkrip-doswal.konversi-nilai');
});

// spatie
Route::get('/dashboard/management-permission', function () {
    return view('pages.admin.management-permission');
});
