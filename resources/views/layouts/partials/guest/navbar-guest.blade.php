<nav class="navbar navbar-expand-lg navbar-theme fixed-top ">
    <div class="container py-2">
        <div class="d-flex justify-content-around">
            <a class="navbar-brand my-auto" href="https://kampusmerdeka.kemdikbud.go.id/" target="_blank">
                <img src="{{ asset('images/logo/Kampus-Merdeka.png') }}" class="img-fluid" width="80"
                    alt="Kampus Merdeka">
            </a>
            <a class="navbar-brand my-auto" href="https://poliwangi.ac.id/" target="_blank">
                <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" class="img-fluid" width="55"
                    alt="Politeknik Negeri Banyuwangi">
            </a>
            <a class="navbar-brand brand-hidden my-auto" href="#">
                <img src="{{ asset('images/logo/logo-poliwangi.png') }}" class="img-fluid" width="96"
                    alt="Poliwangi">
            </a>
        </div>

        {{-- button menu --}}
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex">
                <li class="nav-item mx-3 my-auto">
                    <a class="nav-link navbar-text-hover fw-medium" href="{{ route('landing.page') }}#">Beranda</a>
                </li>
                <li class="nav-item mx-3 my-auto">
                    <a class="nav-link navbar-text-hover" href="{{ route('daftar.lowongan.program') }}">Program</a>
                </li>
                <li class="nav-item mx-3 my-auto">
                    <a class="nav-link navbar-text-hover" href="{{ route('landing.page') }}#persyaratan">Persyaratan</a>
                </li>


                @auth
                    <li class="nav-item mx-3 my-auto">
                        <div class="dropdown">
                            <button class="btn bg-white btn-rounded" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @role('mitra')
                                    <img src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('assets/images/avatar/avatar-1.png') }}"
                                        class="img-fluid rounded-circle" width="35" alt="">
                                @else
                                    <img src="{{ asset('assets/images/avatar/avatar-1.png') }}" class="img-fluid rounded-circle"
                                        width="35" alt="">
                                @endrole

                                &ensp; <i class="fa-solid fa-bars text-theme"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @role('admin')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.admin.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('akademik')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.akademik.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('wadir')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.dosen.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('admin-prodi')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.admin.prodi.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('kaprodi')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.dosen.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('dosen')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.dosen.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('dosen-wali')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.dosen.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('dosen-pembimbing')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.dosen.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('mahasiswa')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.mahasiswa.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('mitra')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.mitra.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole

                                @role('pl-mitra')
                                    <li>
                                        <a class="dropdown-item text-theme fw-medium"
                                            href="{{ route('dashboard.mitra.page') }}">
                                            <i class="fa-solid fa-user"></i>
                                            &ensp; Akun
                                        </a>
                                    </li>
                                @endrole




                                <li>
                                    <a class="dropdown-item text-theme fw-medium" href="{{ route('do.logout') }}">
                                        <i class="fa-solid fa-door-closed"></i>
                                        &ensp; Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth

                @guest
                    <li class="nav-item mx-3 my-auto">
                        <a href="{{ route('login.page') }}" class="btn btn-login px-4 py-2">
                            Login &ensp; <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
