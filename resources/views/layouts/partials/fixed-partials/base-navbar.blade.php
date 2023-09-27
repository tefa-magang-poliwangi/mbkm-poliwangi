<div class="container-fluid">
    <nav class="navbar navbar-expand-lg main-navbar bg-theme">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li>
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </form>

        <ul class="navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('assets/images/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                    {{-- <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div> --}}
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('landing.page') }}" class="dropdown-item has-icon d-flex">
                        <i class="fa-solid fa-house my-auto"></i> <span class="my-auto">&ensp; Beranda</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('do.logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fa-solid fa-right-from-bracket my-auto"></i>
                        <span class="my-auto">&ensp;Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>
