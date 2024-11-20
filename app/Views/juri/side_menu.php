<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Dashboard </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <i class="fa-solid fa-circle-user"></i>
                    <?= $dataUsername ?>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline ">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar border border-0" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-dark">
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
                    <a href="/juri-dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/juri-dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Tim Lomba
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/juri-dashboard/daftar-dinilai" class="nav-link">
                        <i class="fa-solid fa-star"></i>
                        <p>
                            Telah Dinilai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/juri-dashboard/tim-lolos" class="nav-link">
                        <i class="fa-solid fa-bolt"></i>
                        <p>
                            Tim Lolos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>