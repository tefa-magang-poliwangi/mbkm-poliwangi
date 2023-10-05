<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" width="25" class="img-fluid mb-2"
                alt="">

            @auth
                @role('admin')
                    <a href="{{ route('dashboard.admin.page') }}">Poliwangi</a>
                @endrole

                @role('dosen')
                    <a href="{{ route('dashboard.dosen.page') }}">Poliwangi</a>
                @endrole

                @role('mahasiswa')
                    <a href="{{ route('dashboard.mahasiswa.page') }}">Poliwangi</a>
                @endrole

                @role('mitra')
                    <a href="{{ route('dashboard.mitra.page') }}">Poliwangi</a>
                @endrole

                @role('akademik')
                    <a href="{{ route('dashboard.akademik.page') }}">Poliwangi</a>
                @endrole
            @endauth
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" width="25" class="img-fluid mb-2"
                alt="">
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            @auth
                @role('admin')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.admin.page') }}"><i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('dosen')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.dosen.page') }}"><i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('mahasiswa')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.mahasiswa.page') }}"><i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('mitra')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.mitra.page') }}"><i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole

                @role('akademik')
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.akademik.page') }}"><i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole
            @endauth

            @auth
                @role('admin')
                    {{-- Admin Sidebar Menu --}}
                    <li class="menu-header">SUPER ADMIN</li>
                    <li>
                        <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-info-circle"></i>
                            <span>Role</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('permissions.index') }}"><i class="fas fa-exchange-alt"></i>
                            <span>Permission</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-graduation-cap"></i>
                            <span>User</span>
                        </a>
                    </li>
                    {{-- Dosen Sidebar Menu --}}
                    <li class="menu-header">DOSEN</li>
                    <li>
                        <a class="nav-link" href="{{ route('data.mahasiswa.index') }}"><i class="fas fa-graduation-cap"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('data.dosen.index') }}"><i class="fas fa-graduation-cap"></i>
                            <span>Dosen</span>
                        </a>
                    </li>
                    <li>
                        {{-- <a class="nav-link" href="{{ route('daftar.kurikulum.index') }}"><i
                                class="fas fa-info-circle"></i> --}}
                        <a class="nav-link" href="{{ route('daftar.prodi.index') }}"><i class="fas fa-info-circle"></i>
                            <span>Prodi</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.matakuliah.index') }}"><i class="fas fa-info-circle"></i>
                            <span>Matakuliah</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.kurikulum.index') }}"><i class="fas fa-info-circle"></i>

                            <span>Kurikulum</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.matkul.kurikulum.index') }}"><i
                                class="fas fa-info-circle"></i>
                            <span>Matkul Kurikulum</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.data.magangext.index') }}"><i class="fas fa-book"></i>
                            <span>Data Magang External</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-info-circle"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.mahasiswa.index') }}"><i class="fas fa-exchange-alt"></i>
                            <span>Konversi Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-graduation-cap"></i>
                            <span>Validasi PL</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-graduation-cap"></i>
                            <span>Kelayakan Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href=""><i class="fas fa-book"></i>
                            <span>Laporan Harian</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-file-alt"></i>
                            <span>Laporan Mingguan</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-file-alt"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                    {{-- Manajemen Kelas --}}
                    <li>
                        <a class="nav-link" href="{{ route('manajemen.kelas.index') }}"><i class="fas fa-file-alt"></i>
                            <span>Manajemen Kelas</span>
                        </a>
                    </li>
                    {{-- Mitra Sidebar Menu --}}
                    <li class="menu-header">MITRA</li>
                    <li>
                        <a class="nav-link" href="{{ route('formulir.mitra.page') }}"><i class="fas fa-users"></i>
                            <span>Form Mitra</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar-pelamar.mitra.page') }}"><i class="fas fa-user"></i>
                            <span>Daftar Pelamar</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-book"></i>
                            <span>Log Book</span></a>
                    </li>
                    <li class="menu-header">LOWONGAN MAGANG</li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-user-friends"></i>
                            <span>Program</span>
                        </a>
                    </li>

                    <li class="menu-header">KEGIATANKU MBKM</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i>
                            <span>Kegiatanku</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="components-chat-box.html">Laporan Harian</a>
                            </li>
                            <li>
                                <a class="nav-link" href="components-gallery.html">Laporan Mingguan</a>
                            </li>
                            <li>
                                <a class="nav-link" href="components-gallery.html">Laporan Akhir</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-credit-card"></i>
                            <span>Transkrip Nilai</span>
                        </a>
                    </li>

                    <li class="menu-header">Tentang Akun</li>
                    <li>
                        <a class="nav-link" href="/dashboard-mahasiswa/profil"><i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li @endrole @role('dosen') {{-- Dosen Sidebar Menu --}} <li class="menu-header">DOSEN</li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-info-circle"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar.mahasiswa.index') }}"><i class="fas fa-exchange-alt"></i>
                            <span>Konversi Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-graduation-cap"></i>
                            <span>Validasi PL</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="blank.html"><i class="fas fa-graduation-cap"></i>
                            <span>Kelayakan Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-book"></i>
                            <span>Laporan Harian</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-file-alt"></i>
                            <span>Laporan Mingguan</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-file-alt"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>
                @endrole
                @role('dosen-wali')
                    <li>
                        <a class="nav-link" href="{{ route('daftar.mahasiswa.index') }}"><i class="fas fa-exchange-alt"></i>
                            <span>Konversi Nilai</span>
                        </a>
                    </li>
                @endrole
                @role('mitra')
                    {{-- Mitra Sidebar Menu --}}
                    <li class="menu-header">MITRA</li>
                    <li>
                        <a class="nav-link" href="{{ route('formulir.mitra.page') }}"><i class="fas fa-users"></i>
                            <span>Form Mitra</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('daftar-pelamar.mitra.page') }}"><i class="fas fa-user"></i>
                            <span>Daftar Pelamar</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fas fa-book"></i>
                            <span>Log Book</span></a>
                    </li>
                @endrole

                @role('akademik')
                    {{-- Akademik Sidebar Menu --}}
                    <li class="menu-header">SUPER ADMIN</li>
                    <li>
                        <a class="nav-link" href="{{ route('akademik.daftar.prodi') }}"><i class="fas fa-info-circle"></i>
                            <span>Daftar Nilai</span>
                        </a>
                    </li>
                @endrole

                {{-- Mahasiswa Sidebar Menu --}}
                @role('mahasiswa')
                    <li class="menu-header">LOWONGAN MAGANG</li>
                    <li>
                        <a class="nav-link" href="/dashboard-mahasiswa/pendaftaran-magang"><i
                                class="fas fa-user-friends"></i>
                            <span>Program</span>
                        </a>
                    </li>

                    <li class="menu-header">KEGIATANKU MBKM</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i>
                            <span>Kegiatanku</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="/dashboard-mahasiswa/laporan-mahasiswa-harian">Laporan Harian</a>
                            </li>
                            <li>
                                <a class="nav-link" href="components-gallery.html">Laporan Mingguan</a>
                            </li>
                            <li>
                                <a class="nav-link" href="components-gallery.html">Laporan Akhir</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('upload-transkrip-mahasiswa.create', Auth::user()->id) }}"><i
                                class="fas fa-credit-card"></i>
                            <span>Transkrip Nilai</span>
                        </a>
                    </li>

                    <li class="menu-header">Tentang Akun</li>
                    <li>
                        <a class="nav-link" href="/dashboard-mahasiswa/profil"><i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                @endrole
            @endauth

        </ul>
    </aside>
</div>
