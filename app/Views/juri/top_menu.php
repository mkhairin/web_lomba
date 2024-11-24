<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="index.html" class="az-logo text-primary "><span></span> Kaltech</a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="index.html" class="az-logo"><span></span> azia</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item active show">
                    <a href="/juri-dashboard" class="nav-link <?= (current_url() == base_url('/juri-dashboard')) ? 'active text-primary' : '' ?>"> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link with-sub"> Tabel</a>
                    <nav class="az-menu-sub">
                    <a href="/juri-dashboard/daftar-deadline" class="nav-link <?= (current_url() == base_url('/juri-dashboard/daftar-deadline')) ? 'active text-primary' : '' ?>">Deadline Tugas</a>
                        <a href="/juri-dashboard/tim-lomba" class="nav-link <?= (current_url() == base_url('/daftar-sponsor')) ? 'active text-primary' : '' ?>">Daftar Tim Lomba</a>
                        <a href="/juri-dashboard/daftar-dinilai" class="nav-link <?= (current_url() == base_url('/daftar-sekolah')) ? 'active text-primary' : '' ?>">Daftar Penilaian Tim</a>
                        <a href="/juri-dashboard/tim-lolos" class="nav-link <?= (current_url() == base_url('/daftar-pembimbing')) ? 'active text-primary' : '' ?>">Daftar Tim Lolos</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link <?= (current_url() == base_url('/admin/logout')) ? 'active text-primary' : '' ?>"> Logout</a>
                </li>
            </ul>
        </div><!-- az-header-menu -->

    </div><!-- container -->
</div><!-- az-header -->