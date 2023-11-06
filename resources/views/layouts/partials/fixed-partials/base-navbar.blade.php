<div class="container-fluid">
    <nav class="navbar navbar-expand-lg main-navbar bg-theme">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3 mx px-3">
                <li class="d-flex">
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg mx-auto my-auto"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="d-flex">
                    <span class="mx-auto my-auto text-white fw-bold"> {{ $periode_aktif->tahun }} -
                        {{ $semester }}</span>
                </li>
            </ul>
        </form>

        <ul class="navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    @role('mitra')
                        <img alt="image"
                            src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('images/logo/km-template.png') }}"
                            class="rounded-circle mr-1">
                    @else
                        <img alt="image" src="{{ asset('assets/images/avatar/avatar-1.png') }}"
                            class="rounded-circle mr-1">
                    @endrole
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('landing.page') }}" class="dropdown-item has-icon d-flex text-theme">
                        <i class="fa-solid fa-house my-auto"></i> <span class="my-auto">&ensp; Beranda</span>
                    </a>

                    <a href="{{ route('do.logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fa-solid fa-right-from-bracket my-auto"></i>
                        <span class="my-auto">&ensp;Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>
