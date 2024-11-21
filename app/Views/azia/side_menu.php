<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>Dashboard</label>
                <nav class="nav flex-column">
                    <a href="/admin" class="nav-link <?= (current_url() == base_url('/admin')) ? 'active text-primary' : '' ?>">Dashboard</a>
                </nav>

                <label>Tables</label>
                <nav class="nav flex-column">
                    <a href="/daftar-sponsor" class="nav-link <?= (current_url() == base_url('/daftar-sponsor')) ? 'active text-primary' : '' ?>">Daftar Sponsor</a>
                    <a href="/daftar-sekolah" class="nav-link <?= (current_url() == base_url('/daftar-sekolah')) ? 'active text-primary' : '' ?>">Daftar Sekolah</a>
                    <a href="/daftar-pembimbing" class="nav-link <?= (current_url() == base_url('/daftar-pembimbing')) ? 'active text-primary' : '' ?>">Daftar Pembimbing</a>
                    <a href="/daftar-peserta" class="nav-link <?= (current_url() == base_url('/daftar-peserta')) ? 'active text-primary' : '' ?>">Daftar Peserta</a>
                    <a href="/tim-lomba" class="nav-link <?= (current_url() == base_url('/tim-lomba')) ? 'active text-primary' : '' ?>">Daftar Tim Lomba</a>
                    <a href="/daftar-lomba" class="nav-link <?= (current_url() == base_url('/daftar-lomba')) ? 'active text-primary' : '' ?>">Daftar Lomba</a>
                    <a href="/tim-lolos" class="nav-link <?= (current_url() == base_url('/tim-lolos')) ? 'active text-primary' : '' ?>">Daftar Tim Lolos</a>
                    <a href="/daftar-soal" class="nav-link <?= (current_url() == base_url('/daftar-soal')) ? 'active text-primary' : '' ?>">Daftar Soal</a>
                    <a href="/daftar-juara" class="nav-link <?= (current_url() == base_url('/daftar-juara')) ? 'active text-primary' : '' ?>">Daftar Juara</a>
                </nav>

                <label>User Role</label>
                <nav class="nav flex-column">
                    <a href="/user" class="nav-link <?= (current_url() == base_url('/user')) ? 'active text-primary' : '' ?>">Peserta/Juri</a>
                    <a href="/daftar-admin" class="nav-link <?= (current_url() == base_url('/daftar-admin')) ? 'active text-primary' : '' ?>">Admin</a>
                </nav>

                <label>Logout</label>
                <nav class="nav flex-column">
                    <a href="/admin/logout" class="nav-link <?= (current_url() == base_url('/admin/logout')) ? 'active text-primary' : '' ?>">Logout</a>
                </nav>
            </div><!-- component-item -->
        </div><!-- az-content-left -->