<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthDosenController;
use App\Http\Controllers\AuthMahasiswaController;
use App\Http\Controllers\AuthMitraController;
use App\Http\Controllers\DosenPageController;
use App\Http\Controllers\KonversiNilaiExternal;
use App\Http\Controllers\KonversiNilaiInternal;
use App\Http\Controllers\MahasiswaPageController;
use App\Http\Controllers\MitraPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SuperAdminPageController;
use App\Http\Controllers\UploadTranskripNilai;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    //  landing page route and logout

    Route::get('/logout', [AuthController::class, 'do_logout'])->name('do.logout');

    Route::group(['middleware' => ['guest']], function () {
        // auth route
        Route::get('/login-mahasiswa', [AuthMahasiswaController::class, 'login_mahasiswa'])->name('login.mahasiswa.page');
        Route::post('/login-mahasiswa', [AuthMahasiswaController::class, 'do_login_mahasiswa'])->name('do.login.mahasiswa');

        Route::get('/login-dosen', [AuthDosenController::class, 'login_dosen'])->name('login.dosen.page');
        Route::post('/login-dosen', [AuthDosenController::class, 'do_login_dosen'])->name('do.login.dosen');

        Route::get('/login-mitra', [AuthMitraController::class, 'login_mitra'])->name('login.mitra.page');
        Route::post('/login-mitra', [AuthMitraController::class, 'do_login_mitra'])->name('do.login.mitra');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        /**
         * Super Admin
         */
        Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');

        Route::get('/dashboard-admin', [SuperAdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');

        // route dashboard all
        Route::get('/dashboard-mahasiswa', [MahasiswaPageController::class, 'dashboard_mahasiswa'])->name('dashboard.mahasiswa.page');
        Route::get('/dashboard-dosen', [DosenPageController::class, 'dashboard_dosen'])->name('dashboard.dosen.page');
        Route::get('/dashboard-mitra', [MitraPageController::class, 'dashboard_mitra'])->name('dashboard.mitra.page');

        // route backend testing (postman)
        Route::get('/get-detail-mahasiswa/{id_mahasiswa}', [UploadTranskripNilai::class, 'get_mahasiswa'])->name('get.mahasiswa');
        Route::post('/upload-transkrip-nilai-mahasiswa-external/{id_mahasiswa}/{id_magang_ext}/{id_periode}/create', [UploadTranskripNilai::class, 'upload_transkrip_nilai_mahasiswa_external'])->name('upload_transkrip_nilai.mahasiswa.external');

        Route::post('/konversi-nilai/mahasiswa-external/{id_mahasiswa}/{id_matkul}/{id_nilai_magang_ext}/create', [KonversiNilaiExternal::class, 'konversi_nilai_external'])->name('konversi_nilai.mahasiswa.external');
        Route::post('/konversi-nilai/mahasiswa-internal/{id_mahasiswa}/{id_matkul}/{id_lowongan}/create', [KonversiNilaiInternal::class, 'konversi_nilai_nilai'])->name('konversi_nilai.mahasiswa.internal');

        // Halaman Mahasiswa - Eksternal
        Route::get('/dashboard-mahasiswa/profil', function () {
            return view('pages.mahasiswa.profil-mahasiswa.mahasiswa-profil');
        });
        Route::get('/form-upload-transkip', function () {
            return view('pages.mahasiswa.transkrip-nilai-mahasiswa.mahasiswa-form-upload-transkrip');
        });

        // Halaman Mahasiswa - Internal
        Route::get('/dashboard-mahasiswa/lolos-pendaftaran', function () {
            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-lolos-pendaftaran');
        });
        Route::get('/dashboard-mahasiswa/pendaftaran-magang', function () {
            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-pendaftaran-magang');
        });
        Route::get('/dashboard-mahasiswa/rincian-kegiatan', function () {
            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-rincian-kegiatan');
        });
        Route::get('/dashboard-mahasiswa/status-pendaftaran', function () {
            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-status-pendaftaran');
        });
        Route::get('/dashboard-mahasiswa/tidak-lolos-pendaftaran', function () {
            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-tidak-lolos-pendaftaran');
        });

        // Halaman Mitra
        Route::get('/dashboard-mitra/mitra-lowongan', function () {
            return view('pages.mitra.manajemen-mitra.mitra-lowongan');
        });
        Route::get('/dashboard-mitra/form-mitra', function () {
            return view('pages.mitra.manajemen-mitra.mitra-form');
        });
        Route::get('/dashboard-mitra/daftar-pelamar', function () {
            return view('pages.mitra.manajemen-pelamar-mitra.mitra-daftar-pelamar');
        });

        // Halaman Kaprodi
        Route::get('/dashboard-dosen/laporan-akhir', function () {
            return view('pages.dosen.kaprodi-laporan-akhir');
        });
        Route::get('/dashboard-dosen/daftar-konversi', function () {
            return view('pages.dosen.kaprodi-daftar-konversi');
        });
        Route::get('/dashboard-dosen/daftar-konversi/konversi-nilai', function () {
            return view('pages.dosen.kaprodi-konversi-nilai');
        });

        // Halaman Dosen Pembimbing
        Route::get('/dashboard-dosen/laporan-harian', function () {
            return view('pages.dosen.dosbim-laporan-harian');
        });
        Route::get('/dashboard-dosen/laporan-mingguan', function () {
            return view('pages.dosen.dosbim-laporan-mingguan');
        });
        Route::get('/dashboard-dosen/laporan-akhir', function () {
            return view('pages.dosen.dosbim-laporan-akhir');
        });

        // Halaman Dosen wali
        Route::get('/dashboard-dosen/kelayakan-mahasiswa', function () {
            return view('pages.dosen.doswal-kelayakan');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});

//coba
Route::get('/register-mahasiswa', function () {
    return view('pages.auth.register-mahasiswa');
});

Route::get('/data-kurikulum', function () {
    return view('pages.prodi.data-kurikulum');
});
