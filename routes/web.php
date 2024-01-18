<?php

use App\Http\Controllers\JenisProgramController;
use App\Http\Controllers\KoordinatorMagangExtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminJurusanController;
use App\Http\Controllers\AdminJurusanPageController;
use App\Http\Controllers\AkademikPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\DosenPLController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PLMitraController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DosenPageController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\FormMitraController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MitraPageController;
use App\Http\Controllers\WadirPageController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\UploadTranskripNilai;
use App\Http\Controllers\ValidasiNilaiKaprodi;
use App\Http\Controllers\KonversiNilaiExternal;
use App\Http\Controllers\KriteriaPenilaianController;
use App\Http\Controllers\KonversiNilaiInternal;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PLMitraPageController;
use App\Http\Controllers\CPLKurikulumController;
use App\Http\Controllers\DaftarMagangController;
use App\Http\Controllers\MitraLogbookController;
use App\Http\Controllers\MitraLaporanAkhirController;
use App\Http\Controllers\LaporanAkhirPLController;
use App\Http\Controllers\LaporanMingguanPLController;
use App\Http\Controllers\PesertaDosenController;
use App\Http\Controllers\PesertaKelasController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileDosenController;
use App\Http\Controllers\ProfileMitraController;
use App\Http\Controllers\ProfileWadirController;
use App\Http\Controllers\MahasiswaPageController;
use App\Http\Controllers\MitraLowonganController;
use App\Http\Controllers\MitraPlottingController;
use App\Http\Controllers\PelamarMagangController;
use App\Http\Controllers\ProgramMagangController;
use App\Http\Controllers\ValidasiNilaiKaprodiExt;
use App\Http\Controllers\BerkasLowonganController;
use App\Http\Controllers\DPL\LogbookDPLController;
use App\Http\Controllers\DPL\ProfileDPLController;
use App\Http\Controllers\MagangExternalController;
use App\Http\Controllers\ProfileKaprodiController;
use App\Http\Controllers\ProfilePLMitraController;
use App\Http\Controllers\SektorIndustriController;
use App\Http\Controllers\SuperAdminPageController;
use App\Http\Controllers\DPL\KonversiCPLController;
use App\Http\Controllers\DPL\LapakhirDPLController;
use App\Http\Controllers\KatalogLowonganController;
use App\Http\Controllers\MatkulKurikulumController;
use App\Http\Controllers\MitraSertifikatController;
use App\Http\Controllers\ProfileAkademikController;
use App\Http\Controllers\MahasiswaLaporanController;
use App\Http\Controllers\PesertaMagangExtController;
use App\Http\Controllers\ProfileDosenWaliController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\DPL\KonversiNilaiController;
use App\Http\Controllers\KompetensiProgramController;
use App\Http\Controllers\PLMitra\LogbookMhsPLController;
use App\Http\Controllers\PLMitra\PenilaianPLController;
use App\Http\Controllers\LowonganPLController;
use App\Http\Controllers\ProfileAdminJurusanController;
use App\Http\Controllers\KompetensiLowonganController;
use App\Http\Controllers\MitraDaftarPelamarController;
use App\Http\Controllers\ValidasiProgramMagangKaprodi;
use App\Http\Controllers\Kaprodi\PLMahasiswaController;
use App\Http\Controllers\DaftarNilaiMahasiswaController;
use App\Http\Controllers\Kaprodi\LaporanAkhirController;
use App\Http\Controllers\MitraLaporanMingguanController;
use App\Http\Controllers\DaftarPermohonanMagangController;
use App\Http\Controllers\InputKriteriaMahasiswaController;
use App\Http\Controllers\DPL\DaftarPesertaMagangController;
use App\Http\Controllers\Kaprodi\LogbookMahasiswaController;
use App\Http\Controllers\MahasiswaLaporanMingguanController;
use App\Http\Controllers\ManajemenAngkaMutu;
use App\Http\Controllers\ManajemenDetailAngkaMutu;
use App\Http\Controllers\ManajemenDetailNilaiHuruf;
use App\Http\Controllers\ManajemenNilaiHuruf;

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

    // Route Daftar Lowongan Mitra
    Route::get('/daftar-lowongan-mitra/{id_mitra?}', [KatalogLowonganController::class, 'index'])->name('daftar.lowongan.program');

    // Route Guest
    Route::group(['middleware' => ['guest']], function () {
        // Route Auth
        Route::get('/login', [AuthController::class, 'login'])->name('login.page');
        Route::post('/login', [AuthController::class, 'do_login'])->name('do.login');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        // # (Route Super Admin)
        Route::get('/dashboard/admin', [SuperAdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');

        // Route Manajemen Nilai Huruf
        Route::get('/manajemen/profil-nilai-huruf', [ManajemenNilaiHuruf::class, 'index'])->name('manajemen.nilai.huruf.index');
        Route::post('/manajemen/profil-nilai-huruf/store', [ManajemenNilaiHuruf::class, 'store'])->name('manajemen.nilai.huruf.store');
        Route::get('/manajemen/profil-nilai-huruf/{id_profil_nilai_huruf}/update-status', [ManajemenNilaiHuruf::class, 'update'])->name('manajemen.nilai.huruf.update');

        // Route Manajemen Detail Nilai Huruf
        Route::get('/manajemen/detail-nilai-huruf/{id_profil_nilai_huruf}/show', [ManajemenDetailNilaiHuruf::class, 'show'])->name('manajemen.detail.nilai.huruf.show');
        Route::post('/manajemen/detail-nilai-huruf/{id_profil_nilai_huruf}/store', [ManajemenDetailNilaiHuruf::class, 'store'])->name('manajemen.detail.nilai.huruf.store');
        Route::put('/manajemen/detail-nilai-huruf/{id_detail_nilai_huruf}/update', [ManajemenDetailNilaiHuruf::class, 'update'])->name('manajemen.detail.nilai.huruf.update');
        Route::get('/manajemen/detail-nilai-huruf/{id_detail_nilai_huruf}/destroy', [ManajemenDetailNilaiHuruf::class, 'destroy'])->name('manajemen.detail.nilai.huruf.destroy');

        // Route Manajemen Angka Mutu
        Route::get('/manajemen/profil-angka-mutu', [ManajemenAngkaMutu::class, 'index'])->name('manajemen.angka.mutu.index');
        Route::post('/manajemen/profil-angka-mutu/store', [ManajemenAngkaMutu::class, 'store'])->name('manajemen.angka.mutu.store');
        Route::get('/manajemen/profil-angka-mutu/{id_profil_angka_mutu}/update-status', [ManajemenAngkaMutu::class, 'update'])->name('manajemen.angka.mutu.update');

        // Route Manajemen Detail Angka Mutu
        Route::get('/manajemen/detail-angka-mutu/{id_profil_angka_mutu}/show', [ManajemenDetailAngkaMutu::class, 'show'])->name('manajemen.detail.angka.mutu.show');
        Route::post('/manajemen/detail-angka-mutu/{id_profil_angka_mutu}/store', [ManajemenDetailAngkaMutu::class, 'store'])->name('manajemen.detail.angka.mutu.store');
        Route::put('/manajemen/detail-angka-mutu/{id_detail_angka_mutu}/update', [ManajemenDetailAngkaMutu::class, 'update'])->name('manajemen.detail.angka.mutu.update');
        Route::get('/manajemen/detail-angka-mutu/{id_detail_angka_mutu}/destroy', [ManajemenDetailAngkaMutu::class, 'destroy'])->name('manajemen.detail.angka.mutu.destroy');

        // Route Profil Admin
        Route::get('/dashboard/admin/ubah-profil/{id_user}', [ProfileAdminController::class, 'show'])->name('profil.admin.page');
        Route::put('/dashboard/admin/update-profil/{id_user}', [ProfileAdminController::class, 'update'])->name('profil.admin.update');

        // Route Manajemen Dosen
        Route::get('/manajemen/dosen', [DosenController::class, 'index'])->name('manajemen.dosen.index');
        Route::get('/manajemen/dosen/create', [DosenController::class, 'create'])->name('manajemen.dosen.create');
        Route::post('/manajemen/dosen/store', [DosenController::class, 'store'])->name('manajemen.dosen.store');
        Route::get('/manajemen/dosen/{id_dosen}/edit', [DosenController::class, 'edit'])->name('manajemen.dosen.edit');
        Route::put('/manajemen/dosen/{id_dosen}/update', [DosenController::class, 'update'])->name('manajemen.dosen.update');
        Route::get('/manajemen/dosen/{id_dosen}/destroy', [DosenController::class, 'destroy'])->name('manajemen.dosen.destroy');

        // Route Transkrip Mahasiswa External dan Internal
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/index', [KonversiNilaiExternal::class, 'index'])->name('daftar.transkrip.mahasiswa.ext.index');
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/create', [KonversiNilaiExternal::class, 'create'])->name('daftar.transkrip.mahasiswa.ext.create');
        Route::get('/daftar-transkrip-nilai/mahasiswa-external/mahasiswa_{id_mahasiswa}/magang_{id_magang_ext}/transkrip_{id_nilai_magang_ext}', [KonversiNilaiExternal::class, 'show'])->name('daftar.transkrip.mahasiswa.ext.show');

        // Route Konversi Mahasiswa External dan Internal
        Route::post('/konversi-nilai/mahasiswa-external/mahasiswa_{id_mahasiswa}/transkrip_{id_nilai_magang_ext}/create', [KonversiNilaiExternal::class, 'konversi_nilai_external'])->name('konversi.nilai.mahasiswa.ext.create');
        Route::get('/konversi-nilai/mahasiswa-external/{id_nilai_konversi}/destroy', [KonversiNilaiExternal::class, 'destroy'])->name('konversi.nilai.mahasiswa.ext.destroy');
        Route::post('/konversi-nilai/mahasiswa-internal/mahasiswa_{id_mahasiswa}/matkul_{id_matkul}/lowongan_{id_lowongan}/create', [KonversiNilaiInternal::class, 'konversi_nilai_nilai'])->name('konversi.nilai.mahasiswa.int.create');

        // Route Manajemen Prodi
        Route::get('/manajemen/prodi', [ProdiController::class, 'index'])->name('manajemen.prodi.index');
        Route::post('/manajemen/prodi/store', [ProdiController::class, 'store'])->name('manajemen.prodi.store');
        Route::put('/manajemen/prodi/{id_prodi}/update', [ProdiController::class, 'update'])->name('manajemen.prodi.update');
        Route::get('/manajemen/prodi/{id_prodi}/destroy', [ProdiController::class, 'destroy'])->name('manajemen.prodi.destroy');

        // Route Manajemen Jurusan
        Route::get('/manajemen/jurusan', [JurusanController::class, 'index'])->name('manajemen.jurusan.index');
        Route::post('/manajemen/jurusan/store', [JurusanController::class, 'store'])->name('manajemen.jurusan.store');
        Route::put('/manajemen/jurusan/{id_jurusan}/update', [JurusanController::class, 'update'])->name('manajemen.jurusan.update');
        Route::get('/manajemen/jurusan/{id_jurusan}/destroy', [JurusanController::class, 'destroy'])->name('manajemen.jurusan.destroy');

        // Route Manajemen Jenis Program
        Route::get('/manajemen/jenis-program', [JenisProgramController::class, 'index'])->name('manajemen.jenis-program.index');
        Route::post('/manajemen/jenis-program/store', [JenisProgramController::class, 'store'])->name('manajemen.jenis-program.store');
        Route::put('/manajemen/jenis-program/{id_jenis_program}/update', [JenisProgramController::class, 'update'])->name('manajemen.jenis-program.update');
        Route::get('/manajemen/jenis-program/{id_jenis_program}/destroy', [JenisProgramController::class, 'destroy'])->name('manajemen.jenis-program.destroy');

        // # (Route Admin Jurusan)
        Route::get('/dashboard/admin-jurusan', [AdminJurusanPageController::class, 'dashboard_admin_jurusan'])->name('dashboard.admin.jurusan.page');

        // Route Profil Admin Jurusan
        Route::get('/dashboard/admin-jurusan/ubah-profil/{id_user}', [ProfileAdminJurusanController::class, 'show'])->name('profil.admin.jurusan.page');
        Route::put('/dashboard/admin-jurusan/update-profil/{id_user}', [ProfileAdminJurusanController::class, 'update'])->name('profil.admin.jurusan.update');

        // # (Route Kaprodi)
        // Route Manajemen Dosen PL
        Route::get('/manajemen/dosen-pl', [DosenPLController::class, 'index'])->name('manajemen.dosen.pl.index');
        Route::get('/manajemen/dosen-pl/create', [DosenPLController::class, 'create'])->name('manajemen.dosen.pl.create');
        Route::get('/manajemen/{id_dosen_pl}/dosen-pl/show', [DosenPLController::class, 'show'])->name('manajemen.dosen.pl.show');
        Route::post('/manajemen/dosen-pl/store', [DosenPLController::class, 'store'])->name('manajemen.dosen.pl.store');
        Route::get('/manajemen/dosen-pl/{id_dosen_pl}/destroy', [DosenPLController::class, 'destroy'])->name('manajemen.dosen.pl.destroy');

        // Route Manajemen Pelamar
        Route::get('/manajemen/pelamar/{id_dosen_pl}/create', [PelamarMagangController::class, 'create'])->name('manajemen.pelamar.magang.create');
        Route::post('/manajemen/pelamar/{id_dosen_pl}/store', [PelamarMagangController::class, 'store'])->name('manajemen.pelamar.magang.store');
        Route::get('/manajemen/pelamar/{id_dosen_pl}/magang/{id}/destroy', [PelamarMagangController::class, 'destroy'])->name('manajemen.pelamar.magang.destroy');

        // Route Profil Kaprodi
        Route::get('/dashboard/kaprodi/ubah-profil/{id_user}', [ProfileKaprodiController::class, 'show'])->name('profil.kaprodi.page');
        Route::put('/dashboard/kaprodi/update-profil/{id_dosen}', [ProfileKaprodiController::class, 'update'])->name('profil.kaprodi.update');

        // Route validasi Niai Kaprodi External
        Route::get('daftar-transkrip-mahasiswa-ext', [ValidasiNilaiKaprodiExt::class, 'index'])->name('kaprodi.daftar.transkrip.ext.index');
        Route::get('daftar-transkrip.ext-mahasiswa-ext/{id_nilai_magang_ext}/show', [ValidasiNilaiKaprodiExt::class, 'show'])->name('kaprodi.daftar.transkrip.ext.show');
        Route::put('daftar-transkrip.ext-mahasiswa-ext/{id_nilai_konversi}/update', [ValidasiNilaiKaprodiExt::class, 'update'])->name('kaprodi.daftar.transkrip.ext.update');
        Route::put('daftar-transkrip.ext-mahasiswa-ext/{id_nilai_magang_ext}/setujui', [ValidasiNilaiKaprodiExt::class, 'validate_transkrip'])->name('kaprodi.daftar.transkrip.ext.validate');
        Route::get('daftar-transkrip.ext-mahasiswa-disetujui-ext', [ValidasiNilaiKaprodiExt::class, 'create'])->name('kaprodi.daftar.transkrip.ext.disetujui');

        // Route Validasi Nilai Transkrip
        Route::get('/daftar-transkrip-mahasiswa', [ValidasiNilaiKaprodi::class, 'index'])->name('kaprodi.daftar.transkrip.index');
        Route::get('/daftar-transkrip-mahasiswa/show/{id_mahasiswa}', [ValidasiNilaiKaprodi::class, 'show'])->name('kaprodi.daftar.transkrip.show');
        Route::put('/daftar-transkrip-mahasiswa/update', [ValidasiNilaiKaprodi::class, 'update'])->name('kaprodi.daftar.transkrip.update');
        Route::post('/daftar-transkrip-mahasiswa/{id_nilai_konversi}/setujui', [ValidasiNilaiKaprodi::class, 'setujuiNilai'])->name('kaprodi.daftar.transkrip.validate');
        Route::get('/daftar-transkrip-mahasiswa-disetujui', [ValidasiNilaiKaprodi::class, 'create'])->name('kaprodi.daftar.transkrip.disetujui');
        Route::get('/setujui/{id_mahasiswa}', [ValidasiNilaiKaprodi::class, 'validate_transk
        rip'])->name('kaprodi.daftar.transkrip.setujui');

        // Route Validasi Program Magang
        Route::get('/daftar-lowongan-magang', [ValidasiProgramMagangKaprodi::class, 'index'])->name('kaprodi.validasi.program.magang.index');
        Route::get('/daftar-lowongan-magang/{id_lowongan}/program-magang', [ValidasiProgramMagangKaprodi::class, 'show'])->name('kaprodi.validasi.program.magang.show');
        Route::put('/daftar-lowongan-magang/{id_lowongan}/validasi-program-magang', [ValidasiProgramMagangKaprodi::class, 'validate_program_magang'])->name('kaprodi.validasi.program.magang.validate');

        Route::get('/kaprodi/daftar-lowongan-magang', [PLMahasiswaController::class, 'index'])->name('kaprodi.daftarlowongan.index');
        Route::get('/kaprodi/daftar-lowongan-magang/{id_lowongan}/program-magang', [PLMahasiswaController::class, 'show'])->name('kaprodi.validasi.daftarlowongan.show');
        //  Route::put('/kaprodi/daftar-lowongan-magang/{id_lowongan}/validasi-program-magang', [PLMahasiswaController::class, 'validate_program_magang'])->name('kaprodi.validasi.daftarlowongan.validate');
        Route::get('/kaprodi/daftar-logbook-mahasiswa', [LogbookMahasiswaController::class, 'index'])->name('kaprodi.logbookmhs.index');
        Route::get('/kaprodi/daftar-logbook-mahasiswa/show/{id_dosen_pl}', [LogbookMahasiswaController::class, 'show'])->name('kaprodi.logbookmhs.show');
        Route::get('/kaprodi/daftar-logbook-mahasiswa/show/page-file/{id_pelamar_magang}', [LogbookMahasiswaController::class, 'PageFile'])->name('kaprodi.logbookmhs.PageFile');
        Route::get('/kaprodi/daftar-logbook-mahasiswa/show-file/{filename}', [LogbookMahasiswaController::class, 'ShowFile'])->name('kaprodi.logbookmhs.ShowFile');


        Route::get('/kaprodi/daftar-lapakhir-mahasiswa', [LaporanAkhirController::class, 'index'])->name('kaprodi.lapakhir.index');
        Route::get('/kaprodi/daftar-lapakhir-mahasiswa/show/{id_dosen_pl}', [LaporanAkhirController::class, 'show'])->name('kaprodi.lapakhir.show');
        Route::get('/kaprodi/daftar-lapakhir-mahasiswa/page-file/{id_pelamar_magang}', [LaporanAkhirController::class, 'PageFile'])->name('kaprodi.daftarlapakhir.PageFile');
        Route::get('/kaprodi/daftar-lapakhir-mahasiswa/show-file/{filename}', [LaporanAkhirController::class, 'showFile'])->name('kaprodi.daftarlapakhir.showFile');

        // Route Manajemen Mahasiswa
        Route::get('/manajemen/mahasiswa/daftar-prodi', [MahasiswaController::class, 'daftar_prodi'])->name('mahasiswa.daftar.prodi');

        Route::get('/manajemen/mahasiswa/{id_pordi}/index', [MahasiswaController::class, 'index'])->name('manajemen.mahasiswa.index');
        Route::get('/manajemen/mahasiswa/{id_prodi}/create', [MahasiswaController::class, 'create'])->name('manajemen.mahasiswa.create');
        Route::post('/manajemen/mahasiswa/{id_prodi}/store', [MahasiswaController::class, 'store'])->name('manajemen.mahasiswa.store');
        Route::get('/manajemen/mahasiswa/{id_mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('manajemen.mahasiswa.edit');
        Route::put('/manajemen/mahasiswa/{id_mahasiswa}/update', [MahasiswaController::class, 'update'])->name('manajemen.mahasiswa.update');
        Route::get('/manajemen/mahasiswa/{id_mahasiswa}/destroy', [MahasiswaController::class, 'destroy'])->name('manajemen.mahasiswa.destroy');

        // Route Manajemen Admin Jurusan
        Route::get('/manajemen/admin-jurusan', [AdminJurusanController::class, 'index'])->name('manajemen.admin.jurusan.index');
        Route::get('/manajemen/admin-jurusan/create', [AdminJurusanController::class, 'create'])->name('manajemen.admin.jurusan.create');
        Route::post('/manajemen/admin-jurusan/store', [AdminJurusanController::class, 'store'])->name('manajemen.admin.jurusan.store');
        Route::get('/manajemen/admin-jurusan/{id_admin_jurusan}/destroy', [AdminJurusanController::class, 'destroy'])->name('manajemen.admin.jurusan.destroy');

        Route::get('/manajemen/cpl-kurikulum/{id_kurikulum}/index', [CPLKurikulumController::class, 'index'])->name('manajemen.cpl.kurikulum.index');
        Route::get('/manajemen/cpl-kurikulum/create', [CPLKurikulumController::class, 'create'])->name('manajemen.cpl.kurikulum.create');
        Route::post('/manajemen/cpl-kurikulum/{id_kurikulum}/store', [CPLKurikulumController::class, 'store'])->name('manajemen.cpl.kurikulum.store');
        Route::put('/manajemen/cpl-kurikulum/cpl_{id_cpl}/kurikulum_{id_kurikulum}/update', [CPLKurikulumController::class, 'update'])->name('manajemen.cpl.kurikulum.update');
        Route::get('/manajemen/cpl-kurikulum/{id_cpl}/destroy', [CPLKurikulumController::class, 'destroy'])->name('manajemen.cpl.kurikulum.destroy');

        // Route Manajemen Matakuliah
        Route::get('/manajemen/matakuliah/daftar-prodi', [MatakuliahController::class, 'daftar_prodi'])->name('matakuliah.daftar.prodi');

        Route::get('/manajemen/matakuliah/{id_prodi}/index', [MatakuliahController::class, 'index'])->name('manajemen.matakuliah.index');
        // Route::get('/manajemen/matakuliah/create', [MatakuliahController::class, 'create'])->name('manajemen.matakuliah.create');
        Route::post('/manajemen/matakuliah/{id_prodi}/store', [MatakuliahController::class, 'store'])->name('manajemen.matakuliah.store');
        Route::put('/manajemen/matakuliah/{id_matkul}/update', [MatakuliahController::class, 'update'])->name('manajemen.matakuliah.update');
        Route::get('/manajemen/matakuliah/{id_matkul}/destroy', [MatakuliahController::class, 'destroy'])->name('manajemen.matakuliah.destroy');

        // Route Manajemen Kurikulum
        Route::get('/manajemen/kurikulum/daftar-prodi', [KurikulumController::class, 'daftar_prodi'])->name('kurikulum.daftar.prodi');

        Route::get('/manajemen/kurikulum/{id_prodi}/index', [KurikulumController::class, 'index'])->name('manajemen.kurikulum.index');
        // Route::get('/manajemen/kurikulum/create', [KurikulumController::class, 'create'])->name('manajemen.kurikulum.create');
        Route::post('/manajemen/kurikulum/{id_prodi}/store', [KurikulumController::class, 'store'])->name('manajemen.kurikulum.store');
        Route::put('/manajemen/kurikulum/{id_kurikulum}/update', [KurikulumController::class, 'update'])->name('manajemen.kurikulum.update');
        Route::get('/manajemen/kurikulum/{id_kurikulum}/destroy', [KurikulumController::class, 'destroy'])->name('manajemen.kurikulum.destroy');

        // Route Manajemen Matakuliah Kurikulum
        Route::get('/manajemen/{id_kurikulum}/{id_prodi}/matakuliah-kurikulum', [MatkulKurikulumController::class, 'index'])->name('manajemen.matkul.kurikulum.index');
        Route::get('/manajemen/matakuliah-kurikulum/{id_kurikulum}/{id_prodi}/create', [MatkulKurikulumController::class, 'create'])->name('manajemen.matkul.kurikulum.create');
        Route::post('/manajemen/matakuliah-kurikulum/{id_kurikulum}/{id_prodi}/store', [MatkulKurikulumController::class, 'store'])->name('manajemen.matkul.kurikulum.store');
        Route::put('/manajemen/matakuliah-kurikulum/{id_matkul_kurikulum}/update', [MatkulKurikulumController::class, 'update'])->name('manajemen.matkul.kurikulum.update');
        Route::get('/manajemen/matakuliah-kurikulum/{id_matkul_kurikulum}/destroy', [MatkulKurikulumController::class, 'destroy'])->name('manajemen.matkul.kurikulum.destroy');

        // Route Manajemen Magang External
        Route::get('/manajemen/magang-external', [MagangExternalController::class, 'index'])->name('manajemen.magang.ext.index');
        Route::post('/manajemen/magang-external/store', [MagangExternalController::class, 'store'])->name('manajemen.magang.ext.store');
        Route::put('/manajemen/magang-external/{id_magang_ext}/update', [MagangExternalController::class, 'update'])->name('manajemen.magang.ext.update');
        Route::get('/manajemen/magang-external/{id_magang_ext}/destroy', [MagangExternalController::class, 'destroy'])->name('manajemen.magang.ext.destroy');

        // Route Manajemen Kelas
        Route::get('/manajemen/kelas/daftar-prodi', [KelasController::class, 'daftar_prodi'])->name('kelas.daftar.prodi');

        Route::get('/manajemen/kelas/{id_prodi}/index', [KelasController::class, 'index'])->name('manajemen.kelas.index');
        Route::post('/manajemen/kelas/{id_prodi}/store', [KelasController::class, 'store'])->name('manajemen.kelas.store');
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
        Route::get('/manajemen/peserta-magang-ext/peserta_magang_ext_{id_peserta_magang_ext}/{id}/destroy', [PesertaMagangExtController::class, 'destroy'])->name('manajemen.peserta.magang.ext.destroy');
        Route::get('/daftar-nilai-kriteria-mahasiswa/{id_mahasiswa}/show', [PesertaMagangExtController::class, 'show'])->name('daftar.nilai.kriteria.mahasiswa.show');
        Route::put('/daftar-nilai-kriteria-mahasiswa/{id}/update', [PesertaMagangExtController::class, 'update'])->name('daftar.nilai.kriteria.mahasiswa.update');

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
        Route::put('/manajemen-pendaftaran/diterima/{id_pelamar_magang}', [MitraDaftarPelamarController::class, 'accept_submission'])->name('manajemen.pelamar.mitra.accept');
        Route::get('/manajemen-pendaftaran/{id_pelamar_magang}/ditolak', [MitraDaftarPelamarController::class, 'decline_submission'])->name('manajemen.pelamar.mitra.decline');
        Route::get('/manajemen-daftar-pelamar-diterima', [MitraDaftarPelamarController::class, 'create'])->name('manajemen.pelamar.mitra.diterima');

        // Route Cek Berkas Permohonan Magang Internal Mahasiswa
        Route::get('/manajemen/pelamar-mitra/{id_pelamar_magang}/cek-kelengkapan-berkas-permohonan', [MitraDaftarPelamarController::class, 'show'])->name('manajemen.pelamar.mitra.show');

        // Route Manajemen Pendamping Lapang Mitra
        Route::get('/manajemen/pendamping-lapang-mitra', [PLMitraController::class, 'index'])->name('manajemen.pendamping.lapang.mitra.index');
        Route::post('/manajemen/pendamping-lapang-mitra/store', [PLMitraController::class, 'store'])->name('manajemen.pendamping.lapang.mitra.store');
        Route::put('/manajemen/pendamping-lapang-mitra/{id_pl_mitra}/update', [PLMitraController::class, 'update'])->name('manajemen.pendamping.lapang.mitra.update');
        Route::get('/manajemen/pendamping-lapang-mitra/{id_pl_mitra}/destroy', [PLMitraController::class, 'destroy'])->name('manajemen.pendamping.lapang.mitra.destroy');

        // # (Route Dosen Pembimbing Lapang)
        Route::get('/dashboard/dosen', [DosenPageController::class, 'dashboard_dosen'])->name('dashboard.dosen.page');
        Route::get('/dashboard/dosen-pembimbing/ubah-profil/{id_user}', [ProfileDPLController::class, 'show'])->name('profil.dosen.pembimbing.page');
        Route::put('/dashboard/dosen-pembimbing/update-profil/{id_dosen}', [ProfileDPLController::class, 'update'])->name('profil.dosen.pembimbing.update');
        Route::get('/dosen-pembimbing/daftar-peserta-magang', [DaftarPesertaMagangController::class, 'index'])->name('daftar.pesertamagang.index');
        Route::get('/dosen-pembimbing/daftarlogbook', [LogbookDPLController::class, 'index'])->name('daftarlogbook.index');
        Route::get('/dosen-pembimbing/daftarlogbook/{id_pelamar_magang}', [LogbookDPLController::class, 'show'])->name('daftarlogbook.show');
        Route::get('/dosen-pembimbing/daftarlapakhir', [LapakhirDPLController::class, 'index'])->name('daftarlapakhir.index');
        Route::get('/dosen-pembimbing/daftarlapakhir/{id_pelamar_magang}', [LapakhirDPLController::class, 'show'])->name('daftarlapakhir.show');
        Route::get('/lapakhir/show-file/{filename}', [LapakhirDPLController::class, 'showFile'])->name('daftarlapakhir.showFile');
        Route::get('/dosen-pembimbing/daftarcpl', [KonversiCPLController::class, 'index'])->name('daftarcpl.index');
        Route::get('/dosen-pembimbing/daftarcpl/{id_mahasiswa}/edit', [KonversiCPLController::class, 'edit'])->name('daftarcpl.edit');
        Route::post('/dosen-pembimbing/daftarcpl/update/{id_logbook}', [KonversiCPLController::class, 'updateCPL'])->name('daftarcpl.update');
        Route::get('/dosen-pembimbing/konversinilai', [KonversiNilaiController::class, 'index'])->name('konversinilai.index');
        Route::get('/dosen-pembimbing/konversinilai/{id_mahasiswa}/edit', [KonversiNilaiController::class, 'edit'])->name('konversinilai.edit');
        Route::get('/dosen-pembimbing/konversinilai/update/{id_mahasiswa}', [KonversiNilaiController::class, 'update'])->name('konversinilai.update');
        Route::post('/dosen-pembimbing/konversinilai/update/{id_mahasiswa}', [KonversiNilaiController::class, 'update'])->name('konversinilai.update');
        Route::post('/daftarcpl/cpl/save', [KonversiCPLController::class, 'save'])->name('cpl.save');
        Route::post('/dosen-pembimbing/daftarlogbook/logbooks/store', [LogbookDPLController::class, 'storeKomentar'])->name('dosen-pembimbing.Komentar.Store');
        Route::post('/dosen-pembimbing/daftarlogbook/logbooks/komentar/{id}', [LogbookDPLController::class, 'updateKomentar'])->name('dosen-pembimbing.Komentar.Update');

        // # (Route Dosen)
        Route::get('/dashboard/dosen', [DosenPageController::class, 'dashboard_dosen'])->name('dashboard.dosen.page');

        // Route Profil Dosen
        Route::get('/dashboard/dosen/ubah-profil/{id_user}', [ProfileDosenController::class, 'show'])->name('profil.dosen.page');
        Route::put('/dashboard/dosen/update-profil/{id_dosen}', [ProfileDosenController::class, 'update'])->name('profil.dosen.update');

        //daftar prodi
        Route::get('/manajemen-kaprodi/daftar-prodi', [KaprodiController::class, 'daftar_prodi'])->name('kaprodi.daftar.prodi');
        // Route Manajemen Kaprodi
        Route::get('/manajemen/kaprodi/{id_prodi}/index', [KaprodiController::class, 'index'])->name('manajemen.kaprodi.index');
        Route::post('/manajemen/kaprodi/{id_prodi}/store', [KaprodiController::class, 'store'])->name('manajemen.kaprodi.store');
        Route::get('/manajemen/kaprodi/{id_kaprodi}/destroy', [KaprodiController::class, 'destroy'])->name('manajemen.kaprodi.destroy');

        // Route Manajemen Dosen Wali
        Route::get('/manajemen/dosen-wali', [DosenWaliController::class, 'index'])->name('manajemen.dosen.wali.index');
        Route::get('/manajemen/dosen-wali/create', [DosenWaliController::class, 'create'])->name('manajemen.dosen.wali.create');
        Route::post('/manajemen/dosen-wali/store', [DosenWaliController::class, 'store'])->name('manajemen.dosen.wali.store');
        Route::get('/manajemen/dosen-wali/{id_dosen_wali}/destroy', [DosenWaliController::class, 'destroy'])->name('manajemen.dosen.wali.destroy');

        // Route Manajemen Dosen PL
        Route::get('/manajemen/dosen-pl', [DosenPLController::class, 'index'])->name('manajemen.dosen.pl.index');
        Route::get('/manajemen/dosen-pl/create', [DosenPLController::class, 'create'])->name('manajemen.dosen.pl.create');
        Route::get('/manajemen/{id_dosen_pl}/dosen-pl/show', [DosenPLController::class, 'show'])->name('manajemen.dosen.pl.show');
        Route::post('/manajemen/dosen-pl/store', [DosenPLController::class, 'store'])->name('manajemen.dosen.pl.store');
        Route::get('/manajemen/dosen-pl/{id_dosen_pl}/destroy', [DosenPLController::class, 'destroy'])->name('manajemen.dosen.pl.destroy');

        // Route Manajemen Peserta Dosen
        Route::get('/manajemen/dosen-wali/{id_dosen_wali}/daftar-prodi', [PesertaDosenController::class, 'daftar_prodi'])->name('peserta.dosen.daftar.prodi');
        Route::get('/manajemen/peserta-dosen/{id_dosen_wali}/{id_prodi}/index', [PesertaDosenController::class, 'index'])->name('manajemen.peserta.dosen.index');
        Route::get('/manajemen/peserta-dosen/{id_dosen_wali}/{id_prodi}/create', [PesertaDosenController::class, 'create'])->name('manajemen.peserta.dosen.create');
        Route::post('/manajemen/peserta-dosen/{id_dosen_wali}/{id_prodi}/store', [PesertaDosenController::class, 'store'])->name('manajemen.peserta.dosen.store');
        Route::get('/manajemen/peserta-dosen/{id}/destroy', [PesertaDosenController::class, 'destroy'])->name('manajemen.peserta.dosen.destroy');

        // # (Route Wadir)
        Route::get('/dashboard/wadir', [WadirPageController::class, 'index'])->name('dashboard.wadir.page');

        // Route Profil Wadir
        Route::get('/dashboard/wadir/ubah-profil/{id_user}', [ProfileWadirController::class, 'show'])->name('profil.wadir.page');
        Route::put('/dashboard/wadir/update-profil/{id_user}', [ProfileWadirController::class, 'update'])->name('profil.wadir.update');

        // # (Route Akademik)
        Route::get('/dashboard/akademik', [AkademikPageController::class, 'index'])->name('dashboard.akademik.page');

        // Route Profil Akademik
        Route::get('/dashboard/akademik/ubah-profil/{id_user}', [ProfileAkademikController::class, 'show'])->name('profil.akademik.page');
        Route::put('/dashboard/akademik/update-profil/{id_user}', [ProfileAkademikController::class, 'update'])->name('profil.akademik.update');

        // Route Koordinator Magang Ext
        Route::get('/dashboard/koordinator', [KoordinatorMagangExtController::class, 'index'])->name('dashboard.koordinator.page');


        // Route Daftar Nilai Mahasiswa - Akademik
        Route::get('/daftar-nilai-khs-mahasiswa/daftar-prodi', [DaftarNilaiMahasiswaController::class, 'daftar_prodi'])->name('akademik.daftar.prodi');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_prodi}/daftar-kelas', [DaftarNilaiMahasiswaController::class, 'daftar_kelas'])->name('akademik.daftar.kelas');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_kelas}/daftar-mahasiswa', [DaftarNilaiMahasiswaController::class, 'daftar_mahasiswa'])->name('akademik.daftar.mahasiswa');
        Route::get('/daftar-nilai-khs-mahasiswa/{id_mahasiswa}/daftar-nilai-mahasiswa', [DaftarNilaiMahasiswaController::class, 'daftar_nilai_mahasiswa'])->name('akademik.daftar.nilai');

        // # (Route Dosen Wali)

        // Route Profil Dosen Wali
        Route::get('/dashboard/dosen-wali/ubah-profil/{id_user}', [ProfileDosenWaliController::class, 'show'])->name('profil.dosen.wali.page');
        Route::put('/dashboard/dosen-wali/update-profil/{id_dosen}', [ProfileDosenWaliController::class, 'update'])->name('profil.dosen.wali.update');

        // # (Route Mahasiswa)
        Route::get('/dashboard/mahasiswa', [MahasiswaPageController::class, 'dashboard_mahasiswa'])->name('dashboard.mahasiswa.page');

        // Route Daftar Magang Internal
        Route::get('/daftar-magang-internal/{id_lowongan}/upload-berkas-lowongan', [DaftarMagangController::class, 'index'])->name('daftar.magang.internal.page');
        Route::post('/upload-berkas-lowongan/{id_lowongan}/store', [DaftarMagangController::class, 'store'])->name('daftar.magang.internal.store');

        // Route Profil Mahasiswa
        Route::get('/dashboard/mahasiswa/ubah-profil/{id_user}', [ProfileMahasiswaController::class, 'show'])->name('profil.mahasiswa.page');
        Route::put('/dashboard/mahasiswa/update-profil/{id_mahasiswa}', [ProfileMahasiswaController::class, 'update'])->name('profil.mahasiswa.update');

        // Route Upload Transkrip Mahasiswa Magang Ext
        Route::get('/upload-transkrip-mahasiswa/magang-external/{id_user}/create', [UploadTranskripNilai::class, 'create'])->name('upload.transkrip.mahasiswa.ext.create');
        Route::post('/upload-transkrip-mahasiswa/magang-external/{id_user}/store', [UploadTranskripNilai::class, 'store'])->name('upload.transkrip.mahasiswa.ext.store');
        Route::get('/upload-transkrip-mahasiswa/magang-external/{id_nilai_magang_ext}/destroy', [UploadTranskripNilai::class, 'destroy'])->name('upload.transkrip.mahasiswa.ext.destroy');

        // Route Daftar Permohonan Magang Internal
        Route::get('/dashboard/mahasiswa/daftar-permohonan-magang', [DaftarPermohonanMagangController::class, 'index'])->name('daftar.permohonan.magang.page');

        //Route Laporan Logbook / harian Mahasiswa
        Route::get('/dashboard/mahasiswa/laporan-harian/index', [MahasiswaLaporanController::class, 'index'])->name('mahasiswa.laporan.harian.index');
        Route::get('/dashboard/mahasiswa/laporan-harian/create', [MahasiswaLaporanController::class, 'create'])->name('mahasiswa.laporan.harian.create');
        Route::post('/dashboard/mahasiswa/laporan-harian/store', [MahasiswaLaporanController::class, 'store'])->name('mahasiswa.laporan.harian.store');
        Route::get('/dashboard/mahasiswa/laporan-harian/{id}/show/', [MahasiswaLaporanController::class, 'show'])->name('mahasiswa.laporan.harian.show');

        //Route Laporan Mingguan mahasiswa
        Route::get('/dashboard/mahasiswa/laporan-mingguan/index', [MahasiswaLaporanMingguanController::class, 'index'])->name('mahasiswa.laporan.mingguan.index');
        Route::get('/dashboard/mahasiswa/laporan-mingguan/create', [MahasiswaLaporanMingguanController::class, 'create'])->name('mahasiswa.laporan.mingguan.create');
        Route::post('dashboard/mahasiswa/laporan-mingguan/store', [MahasiswaLaporanMingguanController::class, 'store'])->name('mahasiswa.laporan.mingguan.store');

        //Route Laporan Akhir mahasiswa
        Route::get('/upload-laporan-akhir/magang-internal/{id_user}/create', [MitraSertifikatController::class, 'create'])->name('upload.laporan.akhir.mahasiswa.int.create');
        Route::put('/upload-laporan-akhir/magang-internal/{id_user}/update', [MitraSertifikatController::class, 'update'])->name('upload.laporan.akhir.mahasiswa.int.update');

        // Route Input Kriteria Penilaian Mahasiswa Magang Ext
        Route::get('/input-kriteria-penilaian/magang_{id_magang_ext}/kriteria_{id_nilai_magang_ext}/index', [InputKriteriaMahasiswaController::class, 'index'])->name('input.kriteria.mahasiswa.ext.index');
        Route::post('/input-kriteria-penilaian/store', [InputKriteriaMahasiswaController::class, 'store'])->name('input.kriteria.mahasiswa.ext.store');
        Route::get('/input-kriteria-penilaian/{id_detail_penilaian_magang_ext}/destroy', [InputKriteriaMahasiswaController::class, 'destroy'])->name('input.kriteria.mahasiswa.ext.destroy');

        // # (Route Mitra)
        //Route Dashboard Mitra
        Route::get('/dashboard/mitra', [MitraPageController::class, 'dashboard_mitra'])->name('dashboard.mitra.page');

        // Route Manajemen Plotting Mita
        Route::get('/manajemen/plotting-mitra/index', [MitraPlottingController::class, 'index'])->name('manajemen.plotting.mitra.index');
        Route::get('/manajemen/plotting-mitra/{id_pl_mitra}/show', [MitraPlottingController::class, 'show'])->name('manajemen.plotting.mitra.show');
        Route::get('/manajemen/plotting-mitra/{id_pl_mitra}/create', [MitraPlottingController::class, 'create'])->name('manajemen.plotting.mitra.create');
        Route::put('/manajemen/plotting-mitra/{id}/update', [MitraPlottingController::class, 'update'])->name('manajemen.plotting.mitra.update');
        Route::post('/manajemen/plotting-mitra/store', [MitraPlottingController::class, 'store'])->name('manajemen.plotting.mitra.store');
        Route::get('/manajemen/plotting-mitra/destroy', [MitraPlottingController::class, 'destroy'])->name('manajemen.plotting.mitra.destroy');

        // Route Profil Mitra
        Route::get('/dashboard/mitra/ubah-profil/{id_user}', [ProfileMitraController::class, 'show'])->name('profil.mitra.page');
        Route::put('/dashboard/mitra/update-profil/{id_mitra}/update', [ProfileMitraController::class, 'update'])->name('profil.mitra.update');

        //Route Manajemen Lowongan Mitra
        Route::get('/manajemen/lowongan-mitra', [MitraLowonganController::class, 'index'])->name('manajemen.lowongan.mitra.index');
        Route::get('/manajemen/lowongan-mitra/create', [MitraLowonganController::class, 'create'])->name('manajemen.lowongan.mitra.create');
        Route::post('/manajemen/lowongan-mitra/store', [MitraLowonganController::class, 'store'])->name('manajemen.lowongan.mitra.store');
        Route::get('/manajemen/lowongan-mitra/{id_lowongan}/edit', [MitraLowonganController::class, 'edit'])->name('manajemen.lowongan.mitra.edit');
        Route::put('/manajemen/lowongan-mitra/{id_lowongan}/update', [MitraLowonganController::class, 'update'])->name('manajemen.lowongan.mitra.update');
        Route::get('/manajemen/lowongan-mitra/{id_lowongan}/destroy', [MitraLowonganController::class, 'destroy'])->name('manajemen.lowongan.mitra.destroy');

        //Route Manajemen Sertifikat Mitra
        Route::get('/manajemen/sertifikat-mitra', [MitraSertifikatController::class, 'index'])->name('manajemen.sertifikat.mitra.index');
        Route::get('/manajemen/sertifikat-mitra/{id_mitra}/show', [MitraSertifikatController::class, 'show'])->name('manajemen.sertifikat.mitra.show');
        Route::get('/manajemen/sertifikat-mitra/{id_transkrip}/show-detail', [MitraSertifikatController::class, 'showdetail'])->name('manajemen.sertifikat.mitra.showdetail');
        Route::post('/manajemen/sertifikat-mitra/{id_pelamar_magang}/store', [MitraSertifikatController::class, 'store'])->name('manajemen.sertifikat.mitra.store');
        Route::delete('/manajemen/sertifikat-mitra/{id_transkrip}/destroy', [MitraSertifikatController::class, 'destroy'])->name('manajemen.sertifikat.mitra.destroy');

        // Route Manajemen Logbook Mitra
        Route::get('/manajemen/mitra-logbook/index', [MitraLogbookController::class, 'index'])->name('manajemen.mitra.logbook.index');
        Route::get('/manajemen/mitra-logbook/{id}/show', [MitraLogbookController::class, 'show'])->name('manajemen.mitra.logbook.show');
        Route::get('/manajemen/mitra-logbook/{id}/show-detail', [MitraLogbookController::class, 'showdetail'])->name('manajemen.mitra.logbook.showdetail');
        // Route Manajemen Laporan Mingguan
        Route::get('/manajemen/laporan-mingguan/{id}/show', [MitraLaporanMingguanController::class, 'show'])->name('manajemen.mitra.lapmingguan.show');

        // Route Manajemen Laporan Akhir
        Route::get('/manajemen/laporan-akhir/index', [MitraLaporanAkhirController::class, 'index'])->name('manajemen.mitra.lapakhir.index');
        Route::get('/manajemen/laporan-akhir/{id}/show', [MitraLaporanAkhirController::class, 'show'])->name('manajemen.mitra.lapakhir.show');

        // Route Manajemen Program Magang
        Route::get('/manajemen/{id_lowongan}/program-magang', [ProgramMagangController::class, 'index'])->name('manajemen.program.magang.index');
        Route::get('/manajemen/program-magang/{id_lowongan}/create', [ProgramMagangController::class, 'create'])->name('manajemen.program.magang.create');
        Route::post('/manajemen/program-magang/{id_lowongan}/store', [ProgramMagangController::class, 'store'])->name('manajemen.program.magang.store');
        Route::get('/manajemen/program-magang/lowongan_{id_lowongan}/{id_program_magang}/edit', [ProgramMagangController::class, 'edit'])->name('manajemen.program.magang.edit');
        Route::put('/manajemen/program-magang/lowongan_{id_lowongan}/{id_program_magang}/update', [ProgramMagangController::class, 'update'])->name('manajemen.program.magang.update');
        Route::get('/manajemen/program-magang/{id_program_magang}/destroy', [ProgramMagangController::class, 'destroy'])->name('manajemen.program.magang.destroy');

        //Route Manajemen Berkas Mitra
        Route::get('/manajemen/berkas-mitra', [BerkasController::class, 'index'])->name('manajemen.berkas.mitra.index');
        Route::get('/manajemen/berkas-mitra/create', [BerkasController::class, 'create'])->name('manajemen.berkas.mitra.create');
        Route::post('/manajemen/berkas-mitra/store', [BerkasController::class, 'store'])->name('manajemen.berkas.mitra.store');
        Route::get('/manajemen/berkas-mitra/{id_berkas}/edit', [BerkasController::class, 'edit'])->name('manajemen.berkas.mitra.edit');
        Route::put('/manajemen/berkas-mitra/{id_berkas}/update', [BerkasController::class, 'update'])->name('manajemen.berkas.mitra.update');
        Route::get('/manajemen/berkas-mitra/{id_berkas}/destroy', [BerkasController::class, 'destroy'])->name('manajemen.berkas.mitra.destroy');

        //Route Manajemen Berkas Lowongan Mitra
        Route::get('/manajemen/{id_berkas}/berkas-lowongan', [BerkasLowonganController::class, 'index'])->name('manajemen.berkas-lowongan.mitra.index');
        Route::get('/manajemen/berkas-lowongan/{id_berkas}/create', [BerkasLowonganController::class, 'create'])->name('manajemen.berkas-lowongan.mitra.create');
        Route::post('/manajemen/berkas-lowongan/{id_berkas}/store', [BerkasLowonganController::class, 'store'])->name('manajemen.berkas-lowongan.mitra.store');
        Route::get('/manajemen/berkas-lowongan/{id_berkas}/{id_berkas_lowongan}/edit', [BerkasLowonganController::class, 'edit'])->name('manajemen.berkas-lowongan.mitra.edit');
        Route::put('/manajemen/berkas-lowongan/{id_berkas}/{id_berkas_lowongan}/update', [BerkasLowonganController::class, 'update'])->name('manajemen.berkas-lowongan.mitra.update');
        Route::get('/manajemen/berkas-lowongan/{id_berkas_lowongan}/destroy', [BerkasLowonganController::class, 'destroy'])->name('manajemen.berkas-lowongan.mitra.destroy');

        //Route Manajemen kompetensi lowongan
        Route::get('/manajemen/{id_lowongan}/kompetensi-lowongan', [KompetensiLowonganController::class, 'index'])->name('manajemen.kompetensi.lowongan.index');
        Route::post('/manajemen/{id_lowongan}/kompetensi-lowongan/store', [KompetensiLowonganController::class, 'store'])->name('manajemen.kompetensi.lowongan.store');
        Route::put('/manajemen/{id}/kompetensi-lowongan/update', [KompetensiLowonganController::class, 'update'])->name('manajemen.kompetensi.lowongan.update');
        Route::get('/manajemen/{id_lowongan}/kompetensi-lowongan/destroy', [KompetensiLowonganController::class, 'destroy'])->name('manajemen.kompetensi.lowongan.destroy');

        ///Route Manajemen Kompetensi Program
        Route::get('/manajemen/{id_program_magang}/kompetensi-program', [KompetensiProgramController::class, 'index'])->name('manajemen.kompetensi.program.index');
        Route::get('/manajemen/kompetensi-program/{id_program_magang}/create', [KompetensiProgramController::class, 'create'])->name('manajemen.kompetensi.program.create');
        Route::post('/manajemen/{id_program_magang}/kompetensi-program/store', [KompetensiProgramController::class, 'store'])->name('manajemen.kompetensi.program.store');
        Route::get('/manajemen/kompetensi-program/{id}/destroy', [KompetensiProgramController::class, 'destroy'])->name('manajemen.kompetensi.program.destroy');

        // # (Route PLMitra)
        //Route Dashboard PLMitra
        Route::get('/dashboard/plmitra', [PLMitraPageController::class, 'dashboard_plmitra'])->name('dashboard.plmitra.page');
        Route::get('/plmitra/LowonganMitra', [LowonganPLController::class, 'index'])->name('lowongan1.index');
        Route::get('/plmitra/LowonganMitra/{id_lowongan}/show', [LowonganPLController::class, 'show'])->name('lowongan1.show');
        Route::get('/plmitra/logbook-mahasiswa', [LogbookMhsPLController::class, 'index'])->name('logbook-mhs.index');
        Route::get('/plmitra/logbook-mahasiswa/{id}', [LogbookMhsPLController::class, 'show'])->name('logbook-mhs.show');
        Route::get('/plmitra/Penilaian', [PenilaianPLController::class, 'index'])->name('penilaian.index');
        Route::get('/plmitra/penilaian-pl/{id_mahasiswa}/create', [PenilaianPLController::class, 'create'])->name('penilaian.create');
        Route::post('/plmitra/penilaian/', [PenilaianPLController::class, 'store'])->name('penilaian.store');
        Route::put('/plmitra/penilaian/', [PenilaianPLController::class, 'update'])->name('penilaian.update');
        Route::get('/plmitra/penilaian/{id_nilaimagang}', [PenilaianPLController::class, 'destroy'])->name('penilaian.destroy');
        Route::get('/plmitra/laporan-akhir', [LaporanAkhirPLController::class, 'index'])->name('laporan-akhir.index');
        Route::get('/plmitra/laporan-akhir/{id}/show', [LaporanAkhirPLController::class, 'show'])->name('laporan-akhir.show');
        Route::get('/plmitra/laporan-mingguan', [LaporanMingguanPLController::class, 'index'])->name('laporan-mingguan.index');
        Route::get('/plmitra/laporan-mingguan/{id}', [LaporanMingguanPLController::class, 'show'])->name('laporan-mingguan.show');
        Route::post('plmitra/laporan-mingguan/{id}/validate', [LaporanMingguanPLController::class, 'validateReport'])->name('laporan-mingguan.validate');

        // Route Profil PLMitra
        Route::get('/dashboard/plmitra/ubah-profil/{id_user}', [ProfilePLMitraController::class, 'show'])->name('profil.plmitra.page');
        Route::put('/dashboard/plmitra/update-profil/{id_plmitra}/update', [ProfilePLMitraController::class, 'update'])->name('profil.plmitra.update');

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

        // Route Imports Data
        Route::post('/import-data-user/admin-jurusan/import', [ImportController::class, 'import_data_user_admin_prodi'])->name('import.data.user.admin.jurusan');
        Route::post('/import-data-user/dosen/import', [ImportController::class, 'import_data_user_dosen'])->name('import.data.user.dosen');
        Route::post('/import-user/mahasiswa/import', [ImportController::class, 'import_user_mahasiswa'])->name('import.user.mahasiswa');
        Route::post('/import-data/mahasiswa/import', [ImportController::class, 'import_data_mahasiswa'])->name('import.data.mahasiswa');
        Route::post('/import-data/matakuliah-prodi/import', [ImportController::class, 'import_data_matakuliah'])->name('import.data.matakuliah');
        Route::post('/import-data/magang-external/import', [ImportController::class, 'import_data_magang_ext'])->name('import.data.magang.ext');
        Route::post('/import-data/kriteria-magang-external/import', [ImportController::class, 'import_data_kriteria_magang_ext'])->name('import.data.kriteria.magang.ext');
        Route::post('/import-data/nilai-kriteria-km/{id_magang_ext}/import', [ImportController::class, 'import_data_nilai_kriteria_km'])->name('import.data.nilai.kriteria.km');
        Route::post('/import-data/peserta-km/import', [ImportController::class, 'import_peserta_km'])->name('import.data.peserta.km');
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

// # Halaman Mitra - Lowongan
Route::get('/dashboard-mitra/daftar-pelamar', function () {
    return view('pages.mitra.manajemen-pelamar-mitra.mitra-daftar-pelamar');
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

Route::get('/dashboard-admin/manajemen-kaprodi', function () {
    return view('pages.admin.manajemen-kaprodi.index');
});
