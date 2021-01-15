<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">{{ site('name') }}</a>
            <a class="navbar-brand hidden" href="./">
                K
            </a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="{{ active('/') }}">
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>

                <h3 class="menu-title">Master Data</h3>
                <li class="{{ active('category') }}">
                    <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-tag"></i>Kategori Barang</a>
                </li>
                <li class="{{ active('stuff', 'group') }}">
                    <a href="{{ route('stuff.index') }}"> <i class="menu-icon fa fa-archive"></i>Barang</a>
                </li>
                @can('isAdmin')
                    <li class="{{ active('user', 'group') }}">
                        <a href="{{ route('user.index') }}"> <i class="menu-icon fa fa-user"></i>Pengguna</a>
                    </li>
                @endcan

                <h3 class="menu-title">Menu</h3>
                <li class="{{ active('stock') }}">
                    <a href="{{ route('stock.index') }}"> <i class="menu-icon fa fa-truck"></i>Stok</a>
                </li>

                <h3 class="menu-title">Pengaturan</h3>
                <li class="{{ active('change_password') }}">
                    <a href="{{ route('change_password') }}"> <i class="menu-icon fa fa-key"></i>Ganti Password</a>
                </li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
