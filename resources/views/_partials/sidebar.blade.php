<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">{{ site('name') }}</a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('sufee-admin/images/logo2.png') }}"
                    alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="{{ active('/') }}">
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
