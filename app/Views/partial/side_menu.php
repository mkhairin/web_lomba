<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Administrator</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
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

                <li class="nav-item" style="border-bottom: 1px solid #dee2e6; margin-bottom: 4px;">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/daftar-sponsor" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Daftar Sponsor
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/daftar-sekolah" class="nav-link">
                        <i class="nav-icon fas fa-school"></i> <!-- Icon for Schools -->
                        <p>
                            Daftar Sekolah
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="/daftar-pembimbing" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i> <!-- Icon for Mentors -->
                        <p>
                            Daftar Pembimbing
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="/daftar-peserta" class="nav-link">
                        <i class="nav-icon fas fa-users"></i> <!-- Icon for Participants -->
                        <p>
                            Daftar Peserta
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/tim-lomba" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i> <!-- Icon for Teams -->
                        <p>
                            Daftar Tim
                        </p>
                    </a>
                </li>

                <li class="nav-item" style="border-bottom: 1px solid #dee2e6; margin-bottom: 4px;">
                    <a href="/daftar-lomba" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>
                            Daftar Lomba
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/tim-lolos" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i> <!-- Icon for Qualified Teams -->
                        <p>
                            Tim Lolos Seleksi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/daftar-soal" class="nav-link">
                        <i class="fa-solid fa-list-check px-2"></i> <!-- Icon for Qualified Teams -->
                        <p>
                            Daftar Soal
                        </p>
                    </a>
                </li>

                <li class="nav-item" style="border-bottom: 1px solid #dee2e6; margin-bottom: 4px;">
                    <a href="/daftar-juara" class="nav-link">
                        <i class="nav-icon fas fa-medal"></i> <!-- Icon for Winners -->
                        <p>
                            Juara Lomba
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Role
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Peserta/Juri
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/daftar-admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Admin
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a href="/admin/logout" class="nav-link">
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