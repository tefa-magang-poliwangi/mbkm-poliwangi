<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" width="25" class="img-fluid mb-2"
                alt="">

            {{-- Icon Dashboard Menu --}}
            @auth
                @role('admin')
                    <a href="{{ route('dashboard.admin.page') }}">Poliwangi</a>
                @endrole

                @role('akademik')
                    <a href="{{ route('dashboard.akademik.page') }}">Poliwangi</a>
                @endrole

                @role('wadir')
                    <a href="{{ route('dashboard.wadir.page') }}">Poliwangi</a>
                @endrole

                @role('admin-prodi')
                    <a href="{{ route('dashboard.admin.prodi.page') }}">Poliwangi</a>
                @endrole

                @role('kaprodi')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('dosen')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('dosen-wali')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('dosen-pembimbing')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('mahasiswa')
                    <a href="{{ route('dashboard.mahasiswa.page') }}">Poliwangi</a>
                @endrole

                @role('mitra')
                    <a href="{{ route('dashboard.mitra.page') }}">Poliwangi</a>
                @endrole

                @role('pl-mitra')
                    <a href="{{ route('dashboard.plmitra.page') }}">Poliwangi</a>
                @endrole
            @endauth
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" width="25" class="img-fluid mb-2"
                alt="">
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            {{-- Dashboard Menu --}}
            @auth
                @role('admin')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.admin.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('wadir')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.wadir.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('akademik')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.akademik.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('admin-prodi')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.admin.prodi.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('kaprodi')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.dosen.page') }}"><i class="fas fa-solid fa-border-all">
                            </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('dosen')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.dosen.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('dosen-wali')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.dosen.page') }}"><i class="fas fa-solid fa-border-all">
                            </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('dosen-pembimbing')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.dosen.page') }}"><i class="fas fa-solid fa-border-all">
                            </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('mahasiswa')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.mahasiswa.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('mitra')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.mitra.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('pl-mitra')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.plmitra.page') }}">
                            <i class="fas fa-solid fa-border-all"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole
            @endauth

            {{-- Menu Super Admin --}}
            @auth
                @role('admin')
                    <li class="menu-header">SUPER ADMIN</li>

                    @can('profil.admin.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.admin.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Admin</span>
                            </a>
                        </li>
                    @endcan
                @endrole

                @can('roles.index')
                    <li>
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <i class="fas fa-solid fa-circle-notch"></i>
                            <span>Role</span>
                        </a>
                    </li>
                @endcan

                @can('permissions.index')
                    <li>
                        <a class="nav-link" href="{{ route('permissions.index') }}">
                            <i class="fas fa-regular fa-circle-dot"></i>
                            <span>Permission</span>
                        </a>
                    </li>
                @endcan

                @can('users.index')
                    <li>
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-solid fa-circle-user"></i>
                            <span>User</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.admin.prodi.index')
                    <li class="menu-header">Data Master</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.admin.prodi.index') }}">
                            <i class="fas fa-solid fa-headset"></i>
                            <span>Admin Prodi</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.prodi.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.prodi.index') }}">
                            <i class="fas fa-solid fa-school-flag"></i>
                            <span>Prodi</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.periode.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.periode.index') }}">
                            <i class="fas fa-solid fa-calendar-day"></i>
                            <span>Manajemen Periode</span>
                        </a>
                    </li>
                @endcan

                @can('formulir.mitra.page')
                    <li>
                        <a class="nav-link" href="{{ route('formulir.mitra.page') }}">
                            <i class="fas fa-solid fa-envelopes-bulk"></i>
                            <span>Data Mitra</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu Wadir --}}
            @auth
                @role('wadir')
                    <li class="menu-header">WADIR</li>

                    @can('profil.wadir.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.wadir.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Wadir</span>
                            </a>
                        </li>
                    @endcan

                    @can('akademik.daftar.prodi')
                        <li>
                            <a class="nav-link" href="{{ route('akademik.daftar.prodi') }}">
                                <i class="fas fa-info-circle"></i>
                                <span>Daftar Nilai</span>
                            </a>
                        </li>
                    @endcan
                @endrole
            @endauth

            {{-- Menu Akademik --}}
            @auth
                @role('akademik')
                    <li class="menu-header">AKADEMIK</li>

                    @can('profil.akademik.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.akademik.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Akademik</span>
                            </a>
                        </li>
                    @endcan

                    @can('akademik.daftar.prodi')
                        <li>
                            <a class="nav-link" href="{{ route('akademik.daftar.prodi') }}">
                                <i class="fas fa-info-circle"></i>
                                <span>Daftar Nilai</span>
                            </a>
                        </li>
                    @endcan
                @endrole
            @endauth

            {{-- Menu Admin Prodi --}}
            @auth
                @role('admin-prodi')
                    <li class="menu-header">ADMIN PRODI</li>

                    @can('profil.admin.prodi.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.admin.prodi.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Admin Prodi</span>
                            </a>
                        </li>
                    @endcan
                @endrole

                @can('manajemen.dosen.index')
                    <li class="menu-header">Manajemen Data</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.index') }}">
                            <i class="fas fa-solid fa-user-graduate"></i>
                            <span>Data Dosen</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.dosen.wali.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.wali.index') }}">
                            <i class="fas fa-solid fa-user-graduate"></i>
                            <span>Data Dosen Wali</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.kaprodi.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kaprodi.index') }}">
                            <i class="fas fa-solid fa-user-graduate"></i>
                            <span>Data Kaprodi</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.kelas.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kelas.index') }}">
                            <i class="fas fa-solid fa-layer-group"></i>
                            <span>Data Kelas</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.mahasiswa.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mahasiswa.index') }}">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Data Mahasiswa</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.kurikulum.index')
                    <li class="menu-header">Data Kurikulum</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kurikulum.index') }}">
                            <i class="fas fa-solid fa-book-journal-whills"></i>
                            <span>Kurikulum</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.matakuliah.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.matakuliah.index') }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Matakuliah</span>
                        </a>
                    </li>
                @endcan
                @can('manajemen.magang.ext.index')
                    <li class="menu-header">Data Magang</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.magang.ext.index') }}">
                            <i class="fas fa-building"></i>
                            <span>Magang External</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mitra.index') }}"><i
                                class="fas fa-solid fa-envelopes-bulk"></i>
                            <span>Data Mitra</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.kategori.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kategori.index') }}">
                            <i class="fas fa-solid fa-shapes"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.sektor.industri.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.sektor.industri.index') }}">
                            <i class="fas fa-solid fa-industry"></i>
                            <span>Sektor Industri</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu Kaprodi --}}
            @auth
                @role('kaprodi')
                    <li class="menu-header">KAPRODI</li>

                    @can('profil.kaprodi.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.kaprodi.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Kaprodi</span>
                            </a>
                        </li>
                    @endcan
                @endrole

                @can('kaprodi.daftar.transkrip.index')
                    <li>
                        <a class="nav-link" href="{{ route('kaprodi.daftar.transkrip.index') }}">
                            <i class="fas fa-credit-card"></i>
                            <span>Validasi Transkrip Nilai</span>
                        </a>
                    </li>
                @endcan

                @can('kaprodi.validasi.program.magang.index')
                    <li>
                        <a class="nav-link" href="{{ route('kaprodi.validasi.program.magang.index') }}">
                            <i class="fas fa-solid fa-bars-progress"></i>
                            <span>Validasi Program Magang</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.dosen.pl.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.pl.index') }}">
                            <i class="fas fa-solid fa-user"></i>
                            <span>Dosen Pembimbing</span>
                        </a>
                    </li>
                @endcan

                @can('kaprodi.logbookmhs.index')
                    <li>
                        <a class="nav-link" href="{{ route('kaprodi.logbookmhs.index') }}">
                            <i class="fas fa-solid fa-user"></i>
                            <span>Logbook Mahasiswa</span>
                        </a>
                    </li>
                @endcan

                @can('kaprodi.lapakhir.index')
                    <li>
                        <a class="nav-link" href="{{ route('kaprodi.lapakhir.index') }}">
                            <i class="fas fa-solid fa-user"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                @endcan

            @endauth

            {{-- Menu Dosen --}}
            @auth
                @role('dosen')
                    <li class="menu-header">DOSEN</li>

                    @can('profil.dosen.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.dosen.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Dosen</span>
                            </a>
                        </li>
                    @endcan
                @endrole

            @endauth

            {{-- Menu Dosen Wali --}}
            @auth
                @role('dosen-wali')
                    <li class="menu-header">DOSEN WALI</li>

                    @can('profil.dosen.wali.page')
                        <li>
                            <a class="nav-link" href="{{ route('profil.dosen.wali.page', auth()->user()->id) }}">
                                <i class="fas fa-solid fa-user"></i>
                                <span>Profil Dosen Wali</span>
                            </a>
                        </li>
                    @endcan
                @endrole

                @can('daftar.transkrip.mahasiswa.ext.index')
                    <li>
                        <a class="nav-link" href="{{ route('daftar.transkrip.mahasiswa.ext.index') }}">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Konversi Nilai</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu Dosen Pembimbing --}}
            @auth
                @role('dosen-pembimbing')
                    <li class="menu-header">DOSEN PEMBIMBING</li>

                    <li>
                        <a class="nav-link" href="#">
                            <i class="fas fa-solid fa-user"></i>
                            <span>Profil Dosen Pembimbing</span>
                        </a>
                    </li>
                @endrole
            @endauth

            {{-- Menu Mahasiswa --}}
            @auth
                @role('mahasiswa')
                    <li class="menu-header">MANAJEMEN MAHASISWA</li>
                @endrole

                @can('profil.mahasiswa.page')
                    <li>
                        <a class="nav-link" href="{{ route('profil.mahasiswa.page', auth()->user()->id) }}">
                            <i class="fas fa-user"></i>
                            <span>Profil Mahasiswa</span>
                        </a>
                    </li>
                @endcan

                @can('upload.transkrip.mahasiswa.ext.create')
                    <li>
                        <a class="nav-link" href="{{ route('upload.transkrip.mahasiswa.ext.create', Auth::user()->id) }}">
                            <i class="fas fa-solid fa-upload"></i>
                            <span>Upload Transkrip</span>
                        </a>
                    </li>
                @endcan

                @role('mahasiswa')
                    <li class="menu-header">KEGIATAN MAGANG </li>
                @endrole
                @can('daftar.permohonan.magang.page')
                    <li>
                        <a class="nav-link" href="{{ route('daftar.permohonan.magang.page') }}">
                            <i class="fas fa-regular fa-folder-open"></i>
                            <span>Daftar Permohonan</span>
                        </a>
                    </li>
                @endcan

                @can('mahasiswa.laporan.harian.index')
                    <li>
                        <a class="nav-link" href="{{ route('mahasiswa.laporan.harian.index') }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Logbook Mahasiswa</span>
                        </a>`
                    </li>
                @endcan
                @can('mahasiswa.laporan.mingguan.index')
                    <li>
                        <a class="nav-link" href="{{ route('mahasiswa.laporan.mingguan.index') }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Laporan Mingguan</span>
                        </a>`
                    </li>
                @endcan
                @can('upload.laporan.akhir.mahasiswa.int.create')
                    <li>
                        <a class="nav-link"
                            href="{{ route('upload.laporan.akhir.mahasiswa.int.create', Auth::user()->id) }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Laporan Akhir</span>
                        </a>`
                    </li>
                @endcan
            @endauth

            {{-- Menu Mitra --}}
            @auth
                @role('mitra')
                    <li class="menu-header">MANAJEMEN MITRA</li>
                @endrole

                @can('profil.mitra.page')
                    <li>
                        <a class="nav-link" href="{{ route('profil.mitra.page', auth()->user()->id) }}">
                            <i class="fas fa-user"></i>
                            <span>Profil Mitra</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.pendamping.lapang.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.pendamping.lapang.mitra.index') }}">
                            <i class="fas fa-solid fa-users-gear fa-2xl"></i>
                            <span>Manajemen PL Mitra</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.pelamar.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.pelamar.mitra.index') }}">
                            <i class="fas fa-solid fa-list-ol"></i>
                            <span>Daftar Pelamar</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.lowongan.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.lowongan.mitra.index') }}">
                            <i class="fas fa-solid fa-briefcase"></i>
                            <span>Lowongan</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.berkas.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.berkas.mitra.index') }}">
                            <i class="fas fa-solid fa-briefcase"></i>
                            <span>Data Berkas</span>
                        </a></i>
                    </li>
                @endcan

                @can('manajemen.sertifikat.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.sertifikat.mitra.index') }}">
                            <i class="fas fa-solid fa-briefcase"></i>
                            <span>Data Sertifikat</span>
                        </a></i>
                    </li>
                @endcan

                @can('manajemen.plotting.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.plotting.mitra.index') }}">
                            <i class="fas fa-solid fa-user"></i>
                            <span>Data Peserta Magang</span>
                        </a>
                    </li>
                @endcan

                @role('mitra')
                    <li class="menu-header">KEGIATAN MAGANG</li>
                @endrole
                @can('manajemen.mitra.logbook.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mitra.logbook.index') }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Logbook Mahasiswa</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.mitra.lapakhir.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mitra.lapakhir.index') }}">
                            <i class="fas fa-solid fa-book"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.profil.mitra.page')
                    <li class="menu-header">Tentang Akun</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.profil.mitra.page', auth()->user()->id) }}"><i
                                class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu PL Mitra --}}
            @auth
                @role('pl-mitra')
                    <li class="menu-header">MITRA</li>
                @endrole

                @can('lowongan1.index')
                    <li>
                        <a class="nav-link" href="{{ route('lowongan1.index') }}">
                            <i class="fas fa-book"></i>
                            <span>lowongan</span>
                        </a>
                    </li>
                @endcan

                @can('penilaian.index')
                    <li>
                        <a class="nav-link" href="{{ route('penilaian.index') }}">
                            <i class="fas fa-book"></i>
                            <span>Penilaian</span>
                        </a>
                    </li>
                @endcan

                @can('daftarlogbook.index')
                    <li>
                        <a class="nav-link" href="{{ route('daftarlogbook.index') }}">
                            <i class="fas fa-book"></i>
                            <span>Logbook Mahasiswa</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.profil.plmitra.page')
                    <li class="menu-header">Tentang Akun</li>
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.profil.plmitra.page', auth()->user()->id) }}"><i
                                class="fas fa-user"></i>
                            <span>Profil PL Mitra</span>
                        </a>
                    </li>
                @endcan

            @endauth
        </ul>
    </aside>
</div>
