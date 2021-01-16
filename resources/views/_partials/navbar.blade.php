<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ image(Auth::user()->photo) }}"
                        style="width: 30px; height: 30px; object-fit: cover;" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <span>{{ Auth::user()->name }}</span>

                    <div class="dropdown-divider"></div>

                    <a class="nav-link" href="{{ route('change_password') }}"><i class="fa fa-key"></i> Ganti
                        Password</a>

                    <a class="nav-link" href="{{-- route('setting.index') --}}"><i class="fa fa-cog"></i> Settings</a>

                    <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>

</header>
