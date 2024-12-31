<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>Dashboard</label>
                <nav class="nav flex-column">
                    <a href="/juri-dashboard" class="nav-link <?= (current_url() == base_url('/juri-dashboard')) ? 'active text-primary' : '' ?>">Dashboard
                        <?php if ($submitTugasBelumDinilaiCount > 0) : ?>
                            <span class="badge bg-danger text-white rounded-circle"><?= $submitTugasBelumDinilaiCount ?></span>
                        <?php endif; ?>
                    </a>
                </nav>

                <label>Tables</label>
                <nav class="nav flex-column">
                    <a href="/juri-dashboard/daftar-deadline" class="nav-link <?= (current_url() == base_url('/juri-dashboard/daftar-deadline')) ? 'active text-primary' : '' ?>">Deadline Tugas</a>
                    <a href="/juri-dashboard/tim-lomba" class="nav-link <?= (current_url() == base_url('/juri-dashboard/tim-lomba')) ? 'active text-primary' : '' ?>">Daftar Tim Lomba</a>
                    <a href="/juri-dashboard/daftar-dinilai" class="nav-link <?= (current_url() == base_url('/juri-dashboard/daftar-dinilai')) ? 'active text-primary' : '' ?>">Daftar Penilaian Tim</a>
                    <a href="/juri-dashboard/tim-lolos" class="nav-link <?= (current_url() == base_url('/juri-dashboard/tim-lolos')) ? 'active text-primary' : '' ?>">Daftar Tim Lolos</a>
                    <a href="/juri-dashboard/tim-belum-lolos" class="nav-link <?= (current_url() == base_url('/juri-dashboard/tim-belum-lolos')) ? 'active text-primary' : '' ?>">Daftar Tim Belum Lolos</a>
                </nav>

                <label>Logout</label>
                <nav class="nav flex-column">
                    <a href="/logout" class="nav-link <?= (current_url() == base_url('/logout')) ? 'active text-primary' : '' ?>">Logout</a>
                </nav>
            </div><!-- component-item -->
        </div><!-- az-content-left -->