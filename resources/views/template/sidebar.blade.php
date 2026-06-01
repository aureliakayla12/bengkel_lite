<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('AdminLTE/dist/img/bengkell.png')}}"" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Bengkel Lite</a>
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

            <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

             <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>Form User</p>
                    </a>
                </li>

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                
                 <li class="nav-item">
                    <a href="/pelanggan" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/motor" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>Motor</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/mekanik" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Mekanik</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="/sparepart" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Sparepart</p>
                    </a>
                </li>
            </ul>
        </li>

            <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Transaksi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                 <li class="nav-item">
                    <a href="/servis" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Servis</p>
                    </a>
                </li>
            </ul>
        </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
