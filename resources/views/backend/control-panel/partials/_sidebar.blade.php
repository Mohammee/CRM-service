<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()?->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @foreach(config('nav') as $nav)
                <li @class(['nav-item', 'menu-open' => isset($nav['sub']) && request()->routeIs($nav['active'])])>
                    <a href="{{ route($nav['route']) }}" @class(["nav-link",  "active" => request()->routeIs($nav['active'])])>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ $nav['title'] }}
                            @isset($nav['sub'])
                            <i class="right fas fa-angle-left"></i>
                            @endisset
                        </p>
                    </a>

                    @isset($nav['sub'])
                    <ul class="nav nav-treeview">
                        @foreach($nav['sub'] as $sub_nav)
                        <li class="nav-item">
                            <a href="{{ route($sub_nav['route']) }}" @class(["nav-link", "active" => request()->routeIs($sub_nav['active'])])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $sub_nav['title'] }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endisset
                </li>
                @endforeach


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
