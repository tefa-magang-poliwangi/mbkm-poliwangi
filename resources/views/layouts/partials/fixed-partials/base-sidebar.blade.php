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

                @role('admin-prodi')
                    <a href="{{ route('dashboard.admin.prodi.page') }}">Poliwangi</a>
                @endrole

                @role('kaprodi')
                    <a href="#">Poliwangi</a>
                @endrole

                @role('dosen')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('dosen-wali')
                    <a href="#">Poliwangi</a>
                @endrole

                @role('dosen-pembimbing')
                    <a href="#">Poliwangi</a>
                @endrole

                @role('mahasiswa')
                    <a href="{{ route('dashboard.mahasiswa.page') }}">Poliwangi</a>
                @endrole

                @role('mitra')
                    <a href="#">Poliwangi</a>
                @endrole

                @role('pl-mitra')
                    <a href="#">Poliwangi</a>
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
                        <a class="nav-link" href="#"><i class="fas fa-solid fa-border-all">
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
                        <a class="nav-link" href="#"><i class="fas fa-solid fa-border-all">
                            </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('dosen-pembimbing')
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-solid fa-border-all">
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
            @endauth

            {{-- Menu Super Admin --}}
            @auth
                @role('admin')
                    <li class="menu-header">SUPER ADMIN</li>
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
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.admin.prodi.index') }}">
                            <i class="fas fa-solid fa-headset"></i>
                            <span>Admin Prodi</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.dosen.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.index') }}">
                            <i class="fas fa-solid fa-user-graduate"></i>
                            <span>Dosen</span>
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

                @can('manajemen.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mitra.index') }}"><i
                                class="fas fa-solid fa-envelopes-bulk"></i>
                            <span>Form Mitra</span>
                        </a>
                    </li>
                @endcan

            @endauth

            {{-- Menu Akademik --}}
            @auth
                @role('akademik')
                    <li class="menu-header">AKADEMIK</li>
                @endrole

                @can('akademik.daftar.prodi')
                    <li>
                        <a class="nav-link" href="{{ route('akademik.daftar.prodi') }}">
                            <i class="fas fa-info-circle"></i>
                            <span>Daftar Nilai</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu Admin Prodi --}}
            @auth
                @role('admin-prodi')
                    <li class="menu-header">ADMIN PRODI</li>
                @endrole


                @can('manajemen.matkul.kurikulum.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.matkul.kurikulum.index') }}">
                            <i class="fas fa-solid fa-book-bookmark"></i>
                            <span>Matkul Kurikulum</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.magang.ext.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.magang.ext.index') }}">
                            <i class="fas fa-solid fa-building"></i>
                            <span>Magang External</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.mahasiswa.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.mahasiswa.index') }}"><i
                                class="fas fa-graduation-cap"></i>
                            <span>Mahasiswa</span>
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

                @can('manajemen.kurikulum.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kurikulum.index') }}">
                            <i class="fas fa-solid fa-book-journal-whills"></i>
                            <span>Kurikulum</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.matkul.kurikulum.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.matkul.kurikulum.index') }}">
                            <i class="fas fa-solid fa-book-bookmark"></i>
                            <span>Matkul Kurikulum</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.kelas.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kelas.index') }}">
                            <i class="fas fa-solid fa-layer-group"></i>
                            <span>Manajemen Kelas</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.magang.ext.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.magang.ext.index') }}">
                            <i class="fas fa-building"></i>
                            <span>Magang External</span>
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

                @can('manajemen.dosen.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.index') }}">
                            <i class="fas fa-solid fa-calendar-day"></i>
                            <span>Manajemen Dosen</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.dosen.wali.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.dosen.wali.index') }}">
                            <i class="fas fa-solid fa-calendar-day"></i>
                            <span>Manajemen Dosen Wali</span>
                        </a>
                    </li>
                @endcan

            @endauth

            @auth
                @role('kaprodi')
                    <li class="menu-header">KAPRODI</li>
                @endrole

                @can('daftar.transkrip.mahasiswa.ext.index')
                    <li>
                        <a class="nav-link" href="{{ route('daftar.transkrip.mahasiswa.ext.index') }}">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Konversi Nilai</span>
                        </a>
                    </li>
                @endcan

                @can('kaprodi.daftar.transkrip.index')
                    <li>
                        <a class="nav-link" href="{{ route('kaprodi.daftar.transkrip.index') }}">
                            <i class="fas fa-credit-card"></i>
                            <span>Daftar Trankrip Nilai</span>
                        </a>
                    </li>
                @endcan

                <li>
                    <a class="nav-link" href="#"><i class="fas fa-solid fa-user-check"></i>
                        <span>Kelayakan Mahasiswa</span>
                    </a>
                </li>
            @endauth

            {{-- Menu Dosen --}}
            @auth
                @role('dosen')
                    <li class="menu-header">DOSEN</li>
                @endrole

            @endauth

            {{-- Menu Dosen Wali --}}
            @auth
                @role('dosen-wali')
                    <li class="menu-header">DOSEN WALI</li>
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

            {{-- Menu PL Mitra --}}
            @auth
                @role('pl-mitra')
                    <li class="menu-header">PL Mitra</li>
                @endrole

                <li>
                    <a class="nav-link" href="#"><i class="fas fa-solid fa-circle-check"></i>
                        <span>Validasi PL</span>
                    </a>
                </li>
            @endauth

            {{-- Menu Mahasiswa --}}
            @auth
                @role('mahasiswa')
                    <li class="menu-header">MAHASISWA</li>
                @endrole

                @can('upload.transkrip.mahasiswa.ext.create')
                    <li>
                        <a class="nav-link" href="{{ route('upload.transkrip.mahasiswa.ext.create', Auth::user()->id) }}"><i
                                class="fas fa-credit-card"></i>
                            <span>Transkrip Nilai</span>
                        </a>
                    </li>
                @endcan

                <li class="menu-header">LOWONGAN MAGANG</li>
                <li>
                    <a class="nav-link" href="/dashboard-mahasiswa/pendaftaran-magang"><i
                            class="fas fa-solid fa-bars-progress"></i>
                        <span>Program</span>
                    </a>
                </li>

                <li class="menu-header">KEGIATANKU MBKM</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i>
                        <span>Kegiatanku</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="#">Laporan Harian</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Laporan Mingguan</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Laporan Akhir</a>
                        </li>
                    </ul>
                </li>

                @can('profil.mahasiswa.page')
                    <li class="menu-header">Tentang Akun</li>
                    <li>
                        <a class="nav-link" href="{{ route('profil.mahasiswa.page', auth()->user()->id) }}"><i
                                class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                @endcan
            @endauth

            {{-- Menu Mitra --}}
            @auth
                @role('mitra')
                    <li class="menu-header">MITRA</li>
                @endrole

                @can('manajemen.pelamar.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.pelamar.mitra.index') }}"><i
                                class="fas fa-solid fa-list-check"></i>
                            <span>Daftar Pelamar</span>
                        </a>
                    </li>
                @endcan

                @can('manajemen.pendamping.lapang.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.pendamping.lapang.mitra.index') }}">
                            <i class="fas fa-solid fa-handshake-simple"></i>
                            <span>PL Mitra</span>
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

                @can('formulir.mitra.page')
                    <li>
                        <a class="nav-link" href="{{ route('formulir.mitra.page') }}">
                            <i class="fas fa-solid fa-envelopes-bulk"></i>
                            <span>Form Mitra</span></a>
                    </li>
                @endcan

                @can('manajemen.pelamar.mitra.index')
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.pelamar.mitra.index') }}">
                            <i class="fas fa-user"></i>
                            <span>Daftar Pelamar</span>
                        </a>
                    </li>
                @endcan

                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-solid fa-bars-progress"></i>
                        <span>Program</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-regular fa-file-lines"></i>
                        <span>Laporan Harian</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-solid fa-file-invoice"></i>
                        <span>Laporan Mingguan</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-solid fa-file-circle-check"></i>
                        <span>Laporan Akhir</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="#"><i class="fas fa-book"></i>
                        <span>Log Book</span>
                    </a>
                </li>
            @endauth

            {{-- Eof --}}
        </ul>
    </aside>
</div>
