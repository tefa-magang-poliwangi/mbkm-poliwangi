<?php

use App\Http\Controllers\AdminProdiController;
use App\Http\Controllers\AdminProdiPageController;
use App\Http\Controllers\AkademikPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CPLKurikulumController;
use App\Http\Controllers\DaftarNilaiMahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenPageController;
use App\Http\Controllers\FormMitraController;
use App\Http\Controllers\InputKriteriaMahasiswaController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KonversiNilaiExternal;
use App\Http\Controllers\KonversiNilaiInternal;
use App\Http\Controllers\KriteriaPenilaianController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\MagangExternalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaPageController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MatkulKurikulumController;
use App\Http\Controllers\MitraPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PesertaKelasController;
use App\Http\Controllers\PesertaMagangExtController;
use App\Http\Controllers\PLMitraController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SuperAdminPageController;
use App\Http\Controllers\UploadTranskripNilai;
use App\Http\Controllers\MitraDaftarPelamarController;
use App\Http\Controllers\SektorIndustriController;
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
    // Landing Page and Logout Routes
    Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');
    Route::get('/logout', [AuthController::class, 'do_logout'])->name('do.logout');

    // Guest Routes
    Route::group(['middleware' => ['guest']], function () {
        // auth route
        Route::get('/login', [AuthController::class, 'login'])->name('login.page');
        Route::post('/login', [AuthController::class, 'do_login'])->name('do.login');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        /**
         * Route Super Admin
         */
        Route::get('/dashboard-admin', [SuperAdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');

        // (Route Data Master)
        // Manajemen Dosen
        Route::get('/dashboard-admin/manajemen-dosen', [DosenController::class, 'index'])->name('data.dosen.index');
        Route::get('/dashboard-admin/manajemen-dosen/create', [DosenController::class, 'create'])->name('data.dosen.create');
        Route::post('/dashboard-admin/manajemen-dosen/store', [DosenController::class, 'store'])->name('data.dosen.store');
        Route::get('/dashboard-admin/manajemen-dosen/{id_dosen}/edit', [DosenController::class, 'edit'])->name('data.dosen.edit');
        Route::put('/dashboard-admin/manajemen-dosen/{id_dosen}/update', [DosenController::class, 'update'])->name('data.dosen.update');
        Route::get('/dashboard-admin/manajemen-dosen/{id_dosen}/destroy', [DosenController::class, 'destroy'])->name('data.dosen.destroy');

        // (Route Konversi Nilai Magang External)
        Route::get('/daftar-konversi-nilai/index', [KonversiNilaiExternal::class, 'index'])->name('daftar.mahasiswa.index');
        Route::get('/daftar-konversi-nilai/create', [KonversiNilaiExternal::class, 'create'])->name('daftar.mahasiswa.create');
        Route::get('/daftar-konversi-nilai/mahasiswa-{id_mahasiswa}/magang-ext-{id_magang_ext}/{id_nilai_magang_ext}', [KonversiNilaiExternal::class, 'show'])->name('daftar.mahasiswa.transkrip.index');
        Route::post('/konversi-nilai/mahasiswa-external/{id_mahasiswa}/{id_nilai_magang_ext}/create', [KonversiNilaiExternal::class, 'konversi_nilai_external'])->name('konversi_nilai.mahasiswa.external');
        Route::get('/konversi-nilai/mahasiswa-external/{id}/delete', [KonversiNilaiExternal::class, 'destroy'])->name('konversi_nilai.mahasiswa.external.hapus');
        Route::post('/konversi-nilai/mahasiswa-internal/{id_mahasiswa}/{id_matkul}/{id_lowongan}/create', [KonversiNilaiInternal::class, 'konversi_nilai_nilai'])->name('konversi_nilai.mahasiswa.internal');

        // (Route Prodi)
        Route::get('/daftar-program-studi/index', [ProdiController::class, 'index'])->name('daftar.prodi.index');
        Route::post('/daftar-program-studi/store', [ProdiController::class, 'store'])->name('daftar.prodi.store');
        Route::get('/daftar-program-studi/delete/{id}', [ProdiController::class, 'destroy'])->name('daftar.prodi.delete');

        /**
         * Route Admin Prodi
         */
        Route::get('/dashboar-adminprodi', [AdminProdiPageController::class, 'dashboard_adminprodi'])->name('dashboard.admin.prodi.page');

        // Manajemen Mahasiswa
        Route::get('/dashboard-admin/manajemen-mahasiswa', [MahasiswaController::class, 'index'])->name('data.mahasiswa.index');
        Route::get('/dashboard-admin/manajemen-mahasiswa/create', [MahasiswaController::class, 'create'])->name('data.mahasiswa.create');
        Route::post('/dashboard-admin/manajemen-mahasiswa/store', [MahasiswaController::class, 'store'])->name('data.mahasiswa.store');
        Route::get('/dashboard-admin/manajemen-mahasiswa/{id_mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('data.mahasiswa.edit');
        Route::put('/dashboard-admin/manajemen-mahasiswa/{id_mahasiswa}/update', [MahasiswaController::class, 'update'])->name('data.mahasiswa.update');
        Route::get('/dashboard-admin/manajemen-mahasiswa/{id_mahasiswa}/destroy', [MahasiswaController::class, 'destroy'])->name('data.mahasiswa.destroy');

        // Manajemen Admin
        Route::get('/dashboard-admin/data-admin', [AdminProdiController::class, 'index'])->name('data.admin.index');
        Route::get('/dashboard-admin/data-admin/create', [AdminProdiController::class, 'create'])->name('data.admin.create');
        Route::post('/dashboard-admin/data-admin/store', [AdminProdiController::class, 'store'])->name('data.admin.store');
        Route::get('/dashboard-admin/data-admin/delete/{id}', [AdminProdiController::class, 'destroy'])->name('data.admin.delete');

        // Manajemen Kategori
        Route::get('/dashboard-admin/kategori', [KategoriController::class, 'index'])->name('data.kategori.index');
        Route::get('/dashboard-admin/kategori/create', [KategoriController::class, 'create'])->name('data.kategori.create');
        Route::post('/dashboard-admin/kategori/store', [KategoriController::class, 'store'])->name('data.kategori.store');
        Route::get('/dashboard-admin/kategori/delete{id}', [KategoriController::class, 'destroy'])->name('data.kategori.delete');
        Route::put('/dashboard-admin/kategori/{id_kategori}/update', [KategoriController::class, 'update'])->name('data.kategori.update');

        // Manajemen Sektor Industri
        Route::get('/dashboard-admin/sektor-industri', [SektorIndustriController::class, 'index'])->name('data.sektor_industri.index');
        Route::get('/dashboard-admin/sektor-industri/create', [SektorIndustriController::class, 'create'])->name('data.sektor_industri.create');
        Route::post('/dashboard-admin/sektor-industri/store', [SektorIndustriController::class, 'store'])->name('data.sektor_industri.store');
        Route::get('/dashboard-admin/sektor-industri/delete{id}', [SektorIndustriController::class, 'destroy'])->name('data.sektor_industri.delete');
        Route::put('/dashboard-admin/sektor-industri/{id_sektor_industri}', [SektorIndustriController::class, 'update'])->name('data.sektor_industri.update');


        // (Route Kurikulum)
        Route::get('/daftar-kurikulum/index', [KurikulumController::class, 'index'])->name('daftar.kurikulum.index');
        Route::get('/daftar-kurikulum/create', [KurikulumController::class, 'create'])->name('daftar.kurikulum.create');
        Route::post('/daftar-kurikulum/store', [KurikulumController::class, 'store'])->name('daftar.kurikulum.store');
        Route::put('/daftar-kurikulum/update/{id}', [KurikulumController::class, 'update'])->name('daftar.kurikulum.update');
        Route::get('/daftar-kurikulum/delete/{id}', [KurikulumController::class, 'destroy'])->name('daftar.kurikulum.delete');

        // (Route CPL Kurikulum)
        Route::get('/daftar-cpl-kurikulum/{id_kurikulum}/index', [CPLKurikulumController::class, 'index'])->name('daftar.cpl_kurikulum.index');
        Route::get('/daftar-cpl-kurikulum/create', [CPLKurikulumController::class, 'create'])->name('daftar.cpl_kurikulum.create');
        Route::post('/daftar-cpl-kurikulum/{id_kurikulum}/store', [CPLKurikulumController::class, 'store'])->name('daftar.cpl_kurikulum.store');
        Route::put('/daftar-cpl-kurikulum/{id}/{id_kurikulum}/update', [CPLKurikulumController::class, 'update'])->name('daftar.cpl_kurikulum.update');
        Route::get('/daftar-cpl-kurikulum/delete/{id}', [CPLKurikulumController::class, 'destroy'])->name('daftar.cpl_kurikulum.delete');

        // (Route Matakuliah)
        Route::get('/daftar-matakuliah/index', [MatakuliahController::class, 'index'])->name('daftar.matakuliah.index');
        Route::get('/daftar-matakuliah/create', [MatakuliahController::class, 'create'])->name('daftar.matakuliah.create');
        Route::post('/daftar-matakuliah/store', [MatakuliahController::class, 'store'])->name('daftar.matakuliah.store');
        Route::put('/daftar-matakuliah/update/{id}', [MatakuliahController::class, 'update'])->name('daftar.matakuliah.update');
        Route::get('/daftar-matakuliah/delete/{id}', [MatakuliahController::class, 'destroy'])->name('daftar.matakuliah.delete');

        // (Route Matkul Kurikulum)
        Route::get('/daftar-matkul-kurikulum/index', [MatkulKurikulumController::class, 'index'])->name('daftar.matkul.kurikulum.index');
        Route::get('/daftar-matkul-kurikulum/create', [MatkulKurikulumController::class, 'create'])->name('daftar.matkul.kurikulum.create');
        Route::post('/daftar-matkul-kurikulum/store', [MatkulKurikulumController::class, 'store'])->name('daftar.matkul.kurikulum.store');
        Route::put('/daftar-matkul-kurikulum/update/{id}', [MatkulKurikulumController::class, 'update'])->name('daftar.matkul.kurikulum.update');
        Route::get('/daftar-matkul-kurikulum/delete/{id}', [MatkulKurikulumController::class, 'destroy'])->name('daftar.matkul.kurikulum.delete');

        // (Route Daftar Magang External)
        Route::get('/daftar-data-magangext/index', [MagangExternalController::class, 'index'])->name('daftar.data.magangext.index');
        Route::post('/daftar-data-magangext/store', [MagangExternalController::class, 'store'])->name('data.magangext.store');
        Route::put('/daftar-data-magangext/update/{id}', [MagangExternalController::class, 'update'])->name('data.magangext.update');
        Route::get('/daftar-data-magangext/delete/{id}', [MagangExternalController::class, 'destroy'])->name('data.magangext.delete');

        // (Route Manajemen Kelas dan Peserta Kelas)
        // route kelas
        Route::get('/dashboard-admin/manajemen-kelas', [KelasController::class, 'index'])->name('manajemen.kelas.index');
        Route::post('/dashboard-admin/manajemen-kelas/tambah-kelas', [KelasController::class, 'store'])->name('manajemen.kelas.store');
        Route::put('/dashboard-admin/manajemen-kelas/{id_kelas}/edit-kelas', [KelasController::class, 'update'])->name('manajemen.kelas.update');
        Route::get('/dashboard-admin/manajemen-kelas/{id_kelas}/hapus-kelas', [KelasController::class, 'destroy'])->name('manajemen.kelas.destroy');

        // route peserta kelas
        Route::get('/dashboard-admin/manajemen-kelas/{id_kelas}/peserta-kelas', [PesertaKelasController::class, 'index'])->name('peserta.kelas.index');
        Route::get('/dashboard-admin/manajemen-kelas/{id_kelas}/tambah-peserta-kelas', [PesertaKelasController::class, 'create'])->name('peserta.kelas.create');
        Route::post('/dashboard-admin/manajemen-kelas/{id_kelas}/tambah-peserta-kelas', [PesertaKelasController::class, 'store'])->name('peserta.kelas.store');
        Route::get('/dashboard-admin/manajemen-kelas/{id_kelas}/{id_peserta_kelas}/hapus-peserta-kelas', [PesertaKelasController::class, 'destroy'])->name('peserta.kelas.destroy');

        //route periode
        Route::get('/dashboard-admin/data-periode/index', [PeriodeController::class, 'index'])->name('data.periode.index');
        Route::post('/dashboard-admin/data-periode/store', [PeriodeController::class, 'store'])->name('data.periode.store');
        Route::put('/dashboard-admin/data-periode/update/{id}', [PeriodeController::class, 'update'])->name('data.periode.update');
        Route::get('/dashboard-admin/data-periode/delete/{id}', [PeriodeController::class, 'destroy'])->name('data.periode.delete');

        // (Route Daftar Peserta Magang External)
        Route::get('/dashboard-admin/manajemen-magang_ext/{id_magang_ext}/peserta-magang_ext', [PesertaMagangExtController::class, 'index'])->name('peserta.magang_ext.index');
        Route::get('/dashboard-admin/manajemen-magang_ext/{id_magang_ext}/tambah-peserta-magang_ext', [PesertaMagangExtController::class, 'create'])->name('peserta.magang_ext.create');
        Route::post('/dashboard-admin/manajemen-magang_ext/{id_magang_ext}/tambah-peserta-magang_ext', [PesertaMagangExtController::class, 'store'])->name('peserta.magang_ext.store');
        Route::get('/dashboard-admin/manajemen-magang_ext/{id_magang_ext}/{id_peserta_magang_ext}/hapus-peserta-magang_ext', [PesertaMagangExtController::class, 'destroy'])->name('peserta.magang_ext.destroy');
        Route::get('/dashboard-admin/manajemen-maganag_ext/{id_magang_ext}/kriteria-penilaian', [MagangExternalController::class], 'show')->name('kriteria.magang_ext.show');

        Route::get('/dashboard-admin/manajemen-kriteria/{id_magang_ext}/kriteria-penilaian', [KriteriaPenilaianController::class, 'index'])->name('kriteria.penilaian.index');
        Route::post('/dashboard-admin/manajemen-kriteria/{id_magang_ext}/tambah-kriteria-penilaian', [KriteriaPenilaianController::class, 'store'])->name('kriteria.penilaian.store');
        Route::put('/dashboard-admin/manajemen-kriteria/update/{id}', [KriteriaPenilaianController::class, 'update'])->name('kriteria.penilaian.update');
        Route::get('/dashboard-admin/manajemen-kriteria/{id_magang_ext}/{id}/hapus-kriteria-penilaian', [KriteriaPenilaianController::class, 'destroy'])->name('kriteria.penilaian.delete');

        //route mitra
        Route::get('/dashboard-admin/formulir-mitra/index', [FormMitraController::class, 'index'])->name('formulir.mitra.index');
        Route::get('/dashboard-admin/formulir-mitra/ceate', [FormMitraController::class, 'create'])->name('formulir.mitra.create');
        Route::post('/dashboard-admin/formulir-mitra/store', [FormMitraController::class, 'store'])->name('formulir.mitra.store');
        Route::get('/dashboard-admin/formulir-mitra/edit/{id}', [FormMitraController::class, 'edit'])->name('formulir.mitra.edit');
        Route::put('/dashboard-admin/formulir-mitra/update/{id}', [FormMitraController::class, 'update'])->name('formulir.mitra.update');
        Route::get('/dashboard-admin/formulir-mitra/delete/{id}', [FormMitraController::class, 'destroy'])->name('formulir.mitra.delete');

        Route::get('/dashboard-admin/mitra-daftar-pelamar', [MitraDaftarPelamarController::class, 'index'])->name('daftar-pelamar.mitra.page');
        // Route::get('/dashboard-admin/data-admin/create', [MitraDaftarPelamarController::class, 'create'])->name('daftar-pelamar.mitra.create');
        Route::post('/dashboard-admin/mitra-daftar/store', [MitraDaftarPelamarController::class, 'store'])->name('daftar-pelamar.mitra.store');
        // Route::get('/dashboard-admin/data-admin/delete/{id}', [MitraDaftarPelamarController::class, 'destroy'])->name('daftar-pelamar.mitra.delete');


        Route::get('/dashboard-mitra/daftar-pendamping/index', [PLMitraController::class, 'index'])->name('data.plmitra.index');
        Route::post('/dashboard-mitra/daftar-pendamping/store', [PLMitraController::class, 'store'])->name('data.plmitra.store');
        /**
         * Route Dosen
         */
        Route::get('/dashboard-dosen', [DosenPageController::class, 'dashboard_dosen'])->name('dashboard.dosen.page');

        // route kaprodi
        Route::get('/dashboard-dosen/daftar-dosen-wali', [KaprodiController::class, 'index']);
        Route::post('/dashboard-dosen/daftar-dosen-wali', [KaprodiController::class, 'store'])->name('dosen-wali-tambah');

        // route dosen
        // route dosen wali
        // route dosen pembimbing

        /**
         * Route Akademik
         */
        Route::get('/dashboard-akademik', [AkademikPageController::class, 'index'])->name('dashboard.akademik.page');
        Route::get('/dashboard-akademik/daftar-prodi', [DaftarNilaiMahasiswaController::class, 'daftar_prodi'])->name('akademik.daftar.prodi');
        Route::get('/dashboard-akademik/daftar-kelas/{id_prodi}', [DaftarNilaiMahasiswaController::class, 'daftar_kelas'])->name('akademik.daftar.kelas');
        Route::get('/dashboard-akademik/daftar-mahasiswa/{id_kelas}', [DaftarNilaiMahasiswaController::class, 'daftar_mahasiswa'])->name('akademik.daftar.mahasiswa');
        Route::get('/dashboard-akademik/daftar-nilai-mahasiswa/{id_mahasiswa}', [DaftarNilaiMahasiswaController::class, 'daftar_nilai_mahasiswa'])->name('akademik.daftar.nilai');

        /**
         * Route Mahasiswa
         */
        Route::get('/dashboard-mahasiswa', [MahasiswaPageController::class, 'dashboard_mahasiswa'])->name('dashboard.mahasiswa.page');

        // (Route Upload Transkrip External)
        // Route::get('/dashboard-mahasiswa/upload-transkrip-mahasiswa/index', [UploadTranskripNilai::class, 'index'])->name('upload-transkrip-mahasiswa.index');
        Route::get('/dashboard-mahasiswa/upload-transkrip-mahasiswa/create/{id_user}', [UploadTranskripNilai::class, 'create'])->name('upload-transkrip-mahasiswa.create');
        Route::post('/dashboard-mahasiswa/upload-transkrip-mahasiswa/store/{id_user}', [UploadTranskripNilai::class, 'store'])->name('upload.transkrip.mahasiswa.store');
        Route::get('/dashboard-mahasiswa/upload-transkrip-mahasiswa/delete/{id_nilai_magang_ext}', [UploadTranskripNilai::class, 'destroy'])->name('upload.transkrip.mahasiswa.destroy');

        // route kriteria penilaian mahasiswa
        Route::get('/dashboard-mahasiswa/input-kriteria-penilaian/{id_magang_ext}', [InputKriteriaMahasiswaController::class, 'index'])->name('nilai_kriteria.magang_ext.page');
        Route::post('/dashboard-mahasiswa/input-kriteria-penilaian/store', [InputKriteriaMahasiswaController::class, 'store'])->name('nilai_kriteria.magang_ext.store');
        Route::get('/dashboard-mahasiswa/hapus-nilai/{id_detail_penilaian_magang_ext}', [InputKriteriaMahasiswaController::class, 'destroy'])->name('nilai_kriteria.magang_ext.destroy');



        Route::get('/dashboard-dosen/daftar-cpl-kurikulum', function () {
            return view('pages.prodi.daftar-cpl-kurikulum');
        });

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
        Route::get('/dashboard-mahasiswa/laporan-harian', function () {
            return view('pages.mahasiswa.laporan-mahasiswa.laporan-harian');
        });
        Route::get('/dashboard-mahasiswa/laporan-mingguan', function () {
            return view('pages.mahasiswa.laporan-mahsiswa.laporan-mingguan');
        });
        Route::get('/dashboard-mahasiswa/laporan-akhir', function () {
            return view('pages.mahasiswa.dosbim-laporan-akhir');
        });

        // Halaman Mitra
        Route::get('/dashboard-mitra/mitra-lowongan/index', [LowonganController::class, 'index'])->name('lowongan.mitra.index');
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

        Route::get('/dashboard-dosen/daftar-cpl-kurikulum', function () {
            return view('pages.prodi.daftar-cpl-kurikulum');
        });
        Route::get('/dashboard-dosen/form-daftar-cpl-kurikulum', function () {
            return view('pages.prodi.form-daftar-cpl');
        });
        Route::get('/dashboard-dosen/daftar-program', function () {
            return view('pages.dosen.kaprodi-daftar-program');
        });
        Route::get('/dashboard-dosen/daftar-mahasiswa', function () {
            return view('pages.dosen.kaprodi-daftar-mahasiswa');
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
        Route::get('/dashboard-dosen/daftar-konversi', function () {
            return view('pages.dosen.doswal-daftarKonversi');
        });
        Route::get('/dashboard-dosen/daftar-konversi/view-hasil', function () {
            return view('pages.dosen.doswal-viewHasilKonversi');
        });

        /**
         * Super User Routes
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
        // Role and Permissions Route
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});


Route::get('/dashboard-adminprodi', function () {
    return view('pages.admin.adminProdi-dashboard');
});

// Route::get('/dashboard-admin/manajemen-kriteria/index', function () {
//     return view('pages.admin.manajemen-kriteria.index');
// });

Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
Route::get('cities', 'DependentDropdownController@cities')->name('cities');
Route::get('districts', 'DependentDropdownController@districts')->name('districts');
Route::get('villages', 'DependentDropdownController@villages')->name('villages');