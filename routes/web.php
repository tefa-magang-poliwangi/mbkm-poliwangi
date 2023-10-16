<?php

use App\Http\Controllers\AdminProdiController;
use App\Http\Controllers\AdminProdiPageController;
use App\Http\Controllers\AkademikPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CPLKurikulumController;
use App\Http\Controllers\DaftarNilaiMahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenPageController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\FormMitraController;
use App\Http\Controllers\InputKriteriaMahasiswaController;
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
use App\Http\Controllers\MitraDaftarPelamarController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PesertaKelasController;
use App\Http\Controllers\PesertaMagangExtController;
use App\Http\Controllers\PLMitraController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\SektorIndustriController;
use App\Http\Controllers\SuperAdminPageController;
use App\Http\Controllers\UploadTranskripNilai;
use App\Http\Controllers\MitraPageController;
use App\Http\Controllers\ValidasiNilaiKaprodi;
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
    // Route Landing page dan logout route
    Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');
    Route::get('/logout', [AuthController::class, 'do_logout'])->name('do.logout');

    // Route Guest
    Route::group(['middleware' => ['guest']], function () {
        // Route Auth
        Route::get('/login', [AuthController::class, 'login'])->name('login.page');
        Route::post('/login', [AuthController::class, 'do_login'])->name('do.login');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        // # (Route Super Admin)
        Route::get('/dashboard/admin', [SuperAdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');

        // Route Manajemen Dosen
        Route::get('/manajemen/dosen', [DosenController::class, 'index'])->name('manajemen.dosen.index');
        Route::get('/manajemen/dosen/create', [DosenController::class, 'create'])->name('manajemen.dosen.create');
        Route::post('/manajemen/dosen/store', [DosenController::class, 'store'])->name('manajemen.dosen.store');
        Route::get('/manajemen/dosen/{id_dosen}/edit', [DosenController::class, 'edit'])->name('manajemen.dosen.edit');
        Route::put('/manajemen/dosen/{id_dosen}/update', [DosenController::class, 'update'])->name('manajemen.dosen.update');
        Route::get('/manajemen/dosen/{id_dosen}/destroy', [DosenController::class, 'destroy'])->name('manajemen.dosen.destroy');
        Route::post('/manajemen/dosen/import', [DosenController::class, 'import'])->name('manajemen.dosen.import');

        // Route Transkrip Mahasiswa External dan Internal
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/index', [KonversiNilaiExternal::class, 'index'])->name('daftar.transkrip.mahasiswa.ext.index');
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/create', [KonversiNilaiExternal::class, 'create'])->name('daftar.transkrip.mahasiswa.ext.create');
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/mahasiswa_{id_mahasiswa}/magang_{id_magang_ext}/transkrip_{id_nilai_magang_ext}', [KonversiNilaiExternal::class, 'show'])->name('daftar.transkrip.mahasiswa.ext.show');

        // Route Konversi Mahasiswa External dan Internal
        Route::post('/konversi-nilai/mahasiswa-external/mahasiswa_{id_mahasiswa}/transkrip_{id_nilai_magang_ext}/create', [KonversiNilaiExternal::class, 'konversi_nilai_external'])->name('konversi.nilai.mahasisa.ext.create');
        Route::get('/konversi-nilai/mahasiswa-external/{id_nilai_konversi}/destroy', [KonversiNilaiExternal::class, 'destroy'])->name('konversi.nilai.mahasisa.ext.destroy');
        Route::post('/konversi-nilai/mahasiswa-internal/mahasiswa_{id_mahasiswa}/matkul_{id_matkul}/lowongan_{id_lowongan}/create', [KonversiNilaiInternal::class, 'konversi_nilai_nilai'])->name('konversi.nilai.mahasisa.int.create');

        // Route Manajemen Prodi
        Route::get('/manajemen/prodi', [ProdiController::class, 'index'])->name('manajemen.prodi.index');
        Route::post('/manajemen/prodi/store', [ProdiController::class, 'store'])->name('manajemen.prodi.store');
        Route::get('/manajemen/prodi/{id_prodi}/destroy', [ProdiController::class, 'destroy'])->name('manajemen.prodi.destroy');

        // # (Route Admin Prodi)
        Route::get('/dashboard/admin-prodi', [AdminProdiPageController::class, 'dashboard_adminprodi'])->name('dashboard.admin.prodi.page');

        // # (Route Kaprodi)
        Route::get('/daftar-transkrip-mahasiswa', [ValidasiNilaiKaprodi::class, 'index'])->name('kaprodi.daftar.transkrip.index');
        Route::get('/daftar-transkrip-mahasiswa/{id_nilai_magang_ext}/show', [ValidasiNilaiKaprodi::class, 'show'])->name('kaprodi.daftar.transkrip.show');
        Route::put('/daftar-transkrip-mahasiswa/{id_nilai_konversi}/update', [ValidasiNilaiKaprodi::class, 'update'])->name('kaprodi.daftar.transkrip.update');

        // Route Manajemen Mahasiswa
        Route::get('/manajemen/mahasiswa', [MahasiswaController::class, 'index'])->name('manajemen.mahasiswa.index');
        Route::get('/manajemen/mahasiswa/create', [MahasiswaController::class, 'create'])->name('manajemen.mahasiswa.create');
        Route::post('/manajemen/mahasiswa/store', [MahasiswaController::class, 'store'])->name('manajemen.mahasiswa.store');
        Route::get('/manajemen/mahasiswa/{id_mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('manajemen.mahasiswa.edit');
        Route::put('/manajemen/mahasiswa/{id_mahasiswa}/update', [MahasiswaController::class, 'update'])->name('manajemen.mahasiswa.update');
        Route::get('/manajemen/mahasiswa/{id_mahasiswa}/destroy', [MahasiswaController::class, 'destroy'])->name('manajemen.mahasiswa.destroy');

        // Route Manajemen Admin
        Route::get('/manajemen/admin-prodi', [AdminProdiController::class, 'index'])->name('manajemen.admin.prodi.index');
        Route::get('/manajemen/admin-prodi/create', [AdminProdiController::class, 'create'])->name('manajemen.admin.prodi.create');
        Route::post('/manajemen/admin-prodi/store', [AdminProdiController::class, 'store'])->name('manajemen.admin.prodi.store');
        Route::get('/manajemen/admin-prodi/{id_admin_prodi}/destroy', [AdminProdiController::class, 'destroy'])->name('manajemen.admin.prodi.destroy');

        Route::get('/manajemen/cpl-kurikulum/{id_kurikulum}/index', [CPLKurikulumController::class, 'index'])->name('manajemen.cpl.kurikulum.index');
        Route::get('/manajemen/cpl-kurikulum/create', [CPLKurikulumController::class, 'create'])->name('manajemen.cpl.kurikulum.create');
        Route::post('/manajemen/cpl-kurikulum/{id_kurikulum}/store', [CPLKurikulumController::class, 'store'])->name('manajemen.cpl.kurikulum.store');
        Route::put('/manajemen/cpl-kurikulum/cpl_{id_cpl}/kurikulum_{id_kurikulum}/update', [CPLKurikulumController::class, 'update'])->name('manajemen.cpl.kurikulum.update');
        Route::get('/manajemen/cpl-kurikulum/{id_cpl}/destroy', [CPLKurikulumController::class, 'destroy'])->name('manajemen.cpl.kurikulum.destroy');

        // Route Manajemen Matakuliah
        Route::get('/manajemen/matakuliah', [MatakuliahController::class, 'index'])->name('manajemen.matakuliah.index');
        Route::get('/manajemen/matakuliah/create', [MatakuliahController::class, 'create'])->name('manajemen.matakuliah.create');
        Route::post('/manajemen/matakuliah/store', [MatakuliahController::class, 'store'])->name('manajemen.matakuliah.store');
        Route::put('/manajemen/matakuliah/{id_matkul}/update', [MatakuliahController::class, 'update'])->name('manajemen.matakuliah.update');
        Route::get('/manajemen/matakuliah/{id_matkul}/destroy', [MatakuliahController::class, 'destroy'])->name('manajemen.matakuliah.destroy');

        // Route Manajemen Kurikulum
        Route::get('/manajemen/kurikulum', [KurikulumController::class, 'index'])->name('manajemen.kurikulum.index');
        Route::get('/manajemen/kurikulum/create', [KurikulumController::class, 'create'])->name('manajemen.kurikulum.create');
        Route::post('/manajemen/kurikulum/store', [KurikulumController::class, 'store'])->name('manajemen.kurikulum.store');
        Route::put('/manajemen/kurikulum/{id_kurikulum}/update', [KurikulumController::class, 'update'])->name('manajemen.kurikulum.update');
        Route::get('/manajemen/kurikulum/{id_kurikulum}/destroy', [KurikulumController::class, 'destroy'])->name('manajemen.kurikulum.destroy');

        // Route Manajemen Matakuliah Kurikulum
        Route::get('/manajemen/matakuliah-kurikulum', [MatkulKurikulumController::class, 'index'])->name('manajemen.matkul.kurikulum.index');
        Route::get('/manajemen/matakuliah-kurikulum/create', [MatkulKurikulumController::class, 'create'])->name('manajemen.matkul.kurikulum.create');
        Route::post('/manajemen/matakuliah-kurikulum/store', [MatkulKurikulumController::class, 'store'])->name('manajemen.matkul.kurikulum.store');
        Route::put('/manajemen/matakuliah-kurikulum/{id_matkul_kurikulum}/update', [MatkulKurikulumController::class, 'update'])->name('manajemen.matkul.kurikulum.update');
        Route::get('/manajemen/matakuliah-kurikulum/{id_matkul_kurikulum}/destroy', [MatkulKurikulumController::class, 'destroy'])->name('manajemen.matkul.kurikulum.destroy');

        // Route Manajemen Magang External
        Route::get('/manajemen/magang-external', [MagangExternalController::class, 'index'])->name('manajemen.magang.ext.index');
        Route::post('/manajemen/magang-external/store', [MagangExternalController::class, 'store'])->name('manajemen.magang.ext.store');
        Route::put('/manajemen/magang-external/{id_magang_ext}/update', [MagangExternalController::class, 'update'])->name('manajemen.magang.ext.update');
        Route::get('/manajemen/magang-external/{id_magang_ext}/destroy', [MagangExternalController::class, 'destroy'])->name('manajemen.magang.ext.destroy');

        // Route Manajemen Kelas
        Route::get('/manajemen/kelas', [KelasController::class, 'index'])->name('manajemen.kelas.index');
        Route::post('/manajemen/kelas/store', [KelasController::class, 'store'])->name('manajemen.kelas.store');
        Route::put('/manajemen/kelas/{id_kelas}/update', [KelasController::class, 'update'])->name('manajemen.kelas.update');
        Route::get('/manajemen/kelas/{id_kelas}/destroy', [KelasController::class, 'destroy'])->name('manajemen.kelas.destroy');

        // Route Manajemen Peserta Kelas
        Route::get('/manajemen/peserta-kelas/{id_kelas}/index', [PesertaKelasController::class, 'index'])->name('manajemen.peserta.kelas.index');
        Route::get('/manajemen/peserta-kelas/{id_kelas}/create', [PesertaKelasController::class, 'create'])->name('manajemen.peserta.kelas.create');
        Route::post('/manajemen/peserta-kelas/{id_kelas}/store', [PesertaKelasController::class, 'store'])->name('manajemen.peserta.kelas.store');
        Route::get('/manajemen/peserta-kelas/kelas_{id_kelas}/peserta_kelas_{id_peserta_kelas}/destroy', [PesertaKelasController::class, 'destroy'])->name('manajemen.peserta.kelas.destroy');

        // Route Manajemen Periode
        Route::get('/manajemen/periode', [PeriodeController::class, 'index'])->name('manajemen.periode.index');
        Route::post('/manajemen/periode/store', [PeriodeController::class, 'store'])->name('manajemen.periode.store');
        Route::put('/manajemen/periode/{id_periode}/update', [PeriodeController::class, 'update'])->name('manajemen.periode.update');

        // Route Manajemen Kategori
        Route::get('/manajemen/kategori', [KategoriController::class, 'index'])->name('manajemen.kategori.index');
        Route::get('/manajemen/kategori/create', [KategoriController::class, 'create'])->name('manajemen.kategori.create');
        Route::post('/manajemen/kategori/store', [KategoriController::class, 'store'])->name('manajemen.kategori.store');
        Route::put('/manajemen/kategori/{id_kategori}/update', [KategoriController::class, 'update'])->name('manajemen.kategori.update');
        Route::get('/manajemen/kategori/{id_kategori}/destroy', [KategoriController::class, 'destroy'])->name('manajemen.kategori.destroy');

        // Route Manajemen Sektor Industri
        Route::get('/manajemen/sektor-industri', [SektorIndustriController::class, 'index'])->name('manajemen.sektor.industri.index');
        Route::get('/manajemen/sektor-industri/create', [SektorIndustriController::class, 'create'])->name('manajemen.sektor.industri.create');
        Route::post('/manajemen/sektor-industri/store', [SektorIndustriController::class, 'store'])->name('manajemen.sektor.industri.store');
        Route::put('/manajemen/sektor-industri/{id_sektor_industri}/update', [SektorIndustriController::class, 'update'])->name('manajemen.sektor.industri.update');
        Route::get('/manajemen/sektor-industri/{id_sektor_industri}/destroy', [SektorIndustriController::class, 'destroy'])->name('manajemen.sektor.industri.destroy');

        // Route Manajemen Peserta Magang External
        Route::get('/manajemen/peserta-magang-ext/magang_{id_magang_ext}', [PesertaMagangExtController::class, 'index'])->name('manajemen.peserta.magang.ext.index');
        Route::get('/manajemen/peserta-magang-ext/magang_{id_magang_ext}/create', [PesertaMagangExtController::class, 'create'])->name('manajemen.peserta.magang.ext.create');
        Route::post('/manajemen/peserta-magang-ext/magang_{id_magang_ext}/store', [PesertaMagangExtController::class, 'store'])->name('manajemen.peserta.magang.ext.store');
        Route::get('/manajemen/peserta-magang-ext/magang_{id_magang_ext}/peserta_magang_ext_{id_peserta_magang_ext}/destroy', [PesertaMagangExtController::class, 'destroy'])->name('manajemen.peserta.magang.ext.destroy');

        // Route Manajemen Kriteria
        Route::get('/manajemen/kriteria/{id_magang_ext}/index', [KriteriaPenilaianController::class, 'index'])->name('manajemen.kriteria.index');
        Route::post('/manajemen/kriteria/{id_magang_ext}/store', [KriteriaPenilaianController::class, 'store'])->name('manajemen.kriteria.store');
        Route::put('/manajemen/kriteria/{id_penilaian_magang_ext}/update', [KriteriaPenilaianController::class, 'update'])->name('manajemen.kriteria.update');
        Route::get('/manajemen/kriteria/{id_penilaian_magang_ext}/destroy', [KriteriaPenilaianController::class, 'destroy'])->name('manajemen.kriteria.destroy');

        // Route Manajemen Mitra
        Route::get('/manajemen/mitra', [FormMitraController::class, 'index'])->name('manajemen.mitra.index');
        Route::get('/manajemen/mitra/create', [FormMitraController::class, 'create'])->name('manajemen.mitra.create');
        Route::post('/manajemen/mitra/store', [FormMitraController::class, 'store'])->name('manajemen.mitra.store');
        Route::get('/manajemen/mitra/{id_mitra}/edit', [FormMitraController::class, 'edit'])->name('manajemen.mitra.edit');
        Route::put('/manajemen/mitra/{id_mitra}/update', [FormMitraController::class, 'update'])->name('manajemen.mitra.update');
        Route::get('/manajemen/mitra/{id_mitra}/destroy', [FormMitraController::class, 'destroy'])->name('manajemen.mitra.destroy');

        // Route Manajemen Pelamar Mitra
        Route::get('/manajemen/pelamar-mitra', [MitraDaftarPelamarController::class, 'index'])->name('manajemen.pelamar.mitra.index');

        // Route Manajemen Pendamping Lapang Mitra
        Route::get('/manajemen/pendamping-lapang-mitra', [PLMitraController::class, 'index'])->name('manajemen.pendamping.lapang.mitra.index');
        Route::post('/manajemen/pendamping-lapang-mitra/store', [PLMitraController::class, 'store'])->name('manajemen.pendamping.lapang.mitra.store');
        Route::put('/manajemen/pendamping-lapang-mitra/{id_pl_mitra}/update', [PLMitraController::class, 'update'])->name('manajemen.pendamping.lapang.mitra.update');
        Route::get('/manajemen/pendamping-lapang-mitra/{id_pl_mitra}/destroy', [PLMitraController::class, 'destroy'])->name('manajemen.pendamping.lapang.mitra.destroy');

        // # (Route Dosen)
        Route::get('/dashboard/dosen', [DosenPageController::class, 'dashboard_dosen'])->name('dashboard.dosen.page');

        // Route Manajemen Dosen Wali
        Route::get('/manajemen/dosen-wali', [DosenWaliController::class, 'index'])->name('manajemen.dosen.wali.index');
        Route::post('/manajemen/dosen-wali/store', [DosenWaliController::class, 'store'])->name('manajemen.dosen.wali.store');

        // # (Route Akademik)
        Route::get('/dashboard/akademik', [AkademikPageController::class, 'index'])->name('dashboard.akademik.page');

        // Route Daftar Nilai Mahasiswa - Akademik
        Route::get('/daftar-nilai-khs-mahasiswa/daftar-prodi', [DaftarNilaiMahasiswaController::class, 'daftar_prodi'])->name('akademik.daftar.prodi');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_prodi}/daftar-kelas', [DaftarNilaiMahasiswaController::class, 'daftar_kelas'])->name('akademik.daftar.kelas');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_kelas}/daftar-mahasiswa', [DaftarNilaiMahasiswaController::class, 'daftar_mahasiswa'])->name('akademik.daftar.mahasiswa');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_mahasiswa}/daftar-nilai-mahasiswa', [DaftarNilaiMahasiswaController::class, 'daftar_nilai_mahasiswa'])->name('akademik.daftar.nilai');

        // # (Route Mahasiswa)
        Route::get('/dashboard/mahasiswa', [MahasiswaPageController::class, 'dashboard_mahasiswa'])->name('dashboard.mahasiswa.page');

        // Route Profil Mahasiswa
        Route::get('/dashboard/mahasiswa/ubah-profil/{id_user}', [ProfileMahasiswaController::class, 'show'])->name('profil.mahasiswa.page');
        Route::put('/dashboard/mahasiswa/update-profil/{id_mahasiswa}', [ProfileMahasiswaController::class, 'update'])->name('profil.mahasiswa.update');

        // Route Upload Transkrip Mahasiswa Magang Ext
        Route::get('/upload-transkrip-mahasiswa/magang-external/{id_user}/create', [UploadTranskripNilai::class, 'create'])->name('upload.transkrip.mahasiswa.ext.create');
        Route::post('/upload-transkrip-mahasiswa/magang-external/{id_user}/store', [UploadTranskripNilai::class, 'store'])->name('upload.transkrip.mahasiswa.ext.store');
        Route::get('/upload-transkrip-mahasiswa/magang-external/{id_nilai_magang_ext}/destroy', [UploadTranskripNilai::class, 'destroy'])->name('upload.transkrip.mahasiswa.ext.destroy');

        // Route Input Kriteria Penilaian Mahasiswa Magang Ext
        Route::get('/input-kriteria-penilaian/magang_{id_magang_ext}/kriteria_{id_nilai_magang_ext}/index', [InputKriteriaMahasiswaController::class, 'index'])->name('input.kriteria.mahasiswa.ext.index');
        Route::post('/input-kriteria-penilaian/store', [InputKriteriaMahasiswaController::class, 'store'])->name('input.kriteria.mahasiswa.ext.store');
        Route::get('/input-kriteria-penilaian/{id_detail_penilaian_magang_ext}/destroy', [InputKriteriaMahasiswaController::class, 'destroy'])->name('input.kriteria.mahasiswa.ext.destroy');

        // # (Route Mitra)
        //Route Dashboard Mitra
        Route::get('/dashboard/mitra', [MitraPageController::class, 'dashboard_mitra'])->name('dashboard.mitra.page');

        //Route Lowongan Mitra
        Route::get('/manajemen/lowongan-mitra', [LowonganController::class, 'index'])->name('manajemen.lowongan.mitra.index');
        Route::get('/manajemen/lowongan-mitra/create', [LowonganController::class, 'create'])->name('manajemen.lowongan.mitra.create');
        Route::post('/manajemen/lowongan-mitra/store', [LowonganController::class, 'store'])->name('manajemen.lowongan.mitra.store');
        Route::get('/manajemen/lowongan-mitra/{id_lowongan}/edit', [LowonganController::class, 'edit'])->name('manajemen.lowongan.mitra.edit');
        Route::put('/manajemen/lowongan-mitra/lowongan-mitra/mitra_{id_mitra}/lowongan_{id_lowongan}/update', [LowonganController::class, 'update'])->name('manajemen.lowongan.mitra.update');
        Route::get('/manajemen/lowongan-mitra/{id_lowongan}/destroy', [LowonganController::class, 'destroy'])->name('manajemen.lowongan.mitra.destroy');

        // # (Route User Super Admin - Spatie)
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/destroy', 'UsersController@destroy')->name('users.destroy');
        });

        // Route Role dan Permissions
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

        // Route API Laravolt Indonesia
        Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
        Route::get('cities', 'DependentDropdownController@cities')->name('cities');
        Route::get('districts', 'DependentDropdownController@districts')->name('districts');
        Route::get('villages', 'DependentDropdownController@villages')->name('villages');
    });
});

// # Halaman yang tidak digunakan
// Halaman Admin
Route::get('/dashboard-admin-prodi', function () {
    return view('pages.admin.admin-prodi-dashboard');
});
Route::get('/dashboard-dosen/daftar-cpl-kurikulum', function () {
    return view('pages.prodi.daftar-cpl-kurikulum');
});

// # Halaman Mahasiswa - Internal (Kurang laporan harian, laporan mingguan)
Route::get('/dashboard-mahasiswa/rincian-kegiatan', function () {
    return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-rincian-kegiatan');
});
Route::get('/dashboard-mahasiswa/lolos-pendaftaran', function () {
    return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-lolos-pendaftaran');
});
Route::get('/dashboard-mahasiswa/tidak-lolos-pendaftaran', function () {
    return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-tidak-lolos-pendaftaran');
});
Route::get('/dashboard-mahasiswa/status-pendaftaran', function () {
    return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-status-pendaftaran');
});
Route::get('/dashboard-mahasiswa/laporan-akhir', function () {
    return view('pages.dosen.dosbim-laporan-akhir');
});
// # Halaman Mahasiswa Internal - tidak ada isi
Route::get('/dashboard-mahasiswa/pendaftaran-magang', function () {
    return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-pendaftaran-magang');
});

// Halaman Kaprodi
Route::get('/dashboard-dosen/laporan-akhir', function () {
    return view('pages.dosen.kaprodi-laporan-akhir');
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
