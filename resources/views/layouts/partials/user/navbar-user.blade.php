<div class="container">
    <nav class=" navbar-expand-lg fixed-top navbar-theme py-3">
        <div class="container-fluid">
            <div class="row justify-content-start px-5 py-2">
                <div class="col d-flex justify-content-between">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo/Kampus-Merdeka.png') }}" class="img-fluid" width="80"
                            alt="">
                        &nbsp;
                        <img src="{{ asset('images/logo/logo-title-poliwangi.png') }}" class="img-fluid" width="55"
                            alt="">

                        &nbsp;
                        <img src="{{ asset('images/logo/logo-poliwangi.png') }}" class="img-fluid" width="96"
                            alt="">
                    </a>
                </div>
                <div class="col d-flex">
                    <div class="collapse navbar-collapse justify-content-end my-auto" id="navbarNavDropdown">
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item my-auto px-4">
                                <a class="nav-link fw-regular navbar-text-hover" href="#">Beranda</a>
                            </li>

                            <li class="nav-item my-auto px-4">
                                <a class="nav-link fw-regular navbar-text-hover" href="#">Lowongan</a>
                            </li>

                            <li class="nav-item my-auto px-4">
                                <a class="nav-link fw-regular navbar-text-hover" href="#">Kegiatan</a>
                            </li>
                        
                            <li class="dropdown" px-3 py-2"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-sm-none d-lg-inline-block text-white btn btn-theme-three ">Hi, Ujang Maman</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="#" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Transkrip Nilai
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('do.logout') }}" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- button responsive --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
</div>
