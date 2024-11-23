<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>Dashboard</label>
                <nav class="nav flex-column">
                    <a href="/juri-dashboard" class="nav-link <?= (current_url() == base_url('/juri-dashboard')) ? 'active text-primary' : '' ?>">Dashboard</a>
                </nav>

                <label>Tables</label>
                <nav class="nav flex-column">
                    <a href="/juri-dashboard/tim-lomba" class="nav-link <?= (current_url() == base_url('/daftar-sponsor')) ? 'active text-primary' : '' ?>">Daftar Tim Lomba</a>
                    <a href="/juri-dashboard/daftar-dinilai" class="nav-link <?= (current_url() == base_url('/daftar-sekolah')) ? 'active text-primary' : '' ?>">Daftar Penilaian Tim</a>
                    <a href="/juri-dashboard/tim-lolos" class="nav-link <?= (current_url() == base_url('/daftar-pembimbing')) ? 'active text-primary' : '' ?>">Daftar Tim Lolos</a>
                </nav>

                <label>Logout</label>
                <nav class="nav flex-column">
                    <a href="/logout" class="nav-link <?= (current_url() == base_url('/logout')) ? 'active text-primary' : '' ?>">Logout</a>
                </nav>
            </div><!-- component-item -->
        </div><!-- az-content-left -->