<div class="az-header">
  <div class="container">
    <div class="az-header-left">
      <img src="<?= base_url('/img/logo/logo.webp') ?>" class="mx-2" alt="Logo-Image" style="width: 21px;">
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
          <a href="/admin" class="nav-link <?= (current_url() == base_url('/admin')) ? 'active text-primary' : '' ?>"> Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link with-sub"> Tabel</a>
          <nav class="az-menu-sub">
            <a href="/daftar-sponsor" class="nav-link <?= (current_url() == base_url('/daftar-sponsor')) ? 'active text-primary' : '' ?>">Daftar Sponsor</a>
            <a href="/daftar-sekolah" class="nav-link <?= (current_url() == base_url('/daftar-sekolah')) ? 'active text-primary' : '' ?>">Daftar Sekolah</a>
            <a href="/daftar-pembimbing" class="nav-link <?= (current_url() == base_url('/daftar-pembimbing')) ? 'active text-primary' : '' ?>">Daftar Pembimbing</a>
            <a href="/daftar-peserta" class="nav-link <?= (current_url() == base_url('/daftar-peserta')) ? 'active text-primary' : '' ?>">Daftar Peserta</a>
            <a href="/tim-lomba" class="nav-link <?= (current_url() == base_url('/tim-lomba')) ? 'active text-primary' : '' ?>">Daftar Tim</a>
            <a href="/tim-lolos" class="nav-link <?= (current_url() == base_url('/tim-lolos')) ? 'active text-primary' : '' ?>">Daftar Tim Lolos</a>
            <a href="/daftar-soal" class="nav-link <?= (current_url() == base_url('/daftar-soal')) ? 'active text-primary' : '' ?>">Daftar Soal Lomba</a>
            <a href="/daftar-juara" class="nav-link <?= (current_url() == base_url('/daftar-juara')) ? 'active text-primary' : '' ?>">Daftar Juara</a>
          </nav>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link with-sub"> User Role</a>
          <nav class="az-menu-sub">
            <a href="/user" class="nav-link <?= (current_url() == base_url('/user')) ? 'active text-primary' : '' ?>">Daftar User</a>
            <a href="/daftar-juri" class="nav-link <?= (current_url() == base_url('/daftar-juri')) ? 'active text-primary' : '' ?>">Daftar Juri</a>
            <a href="/daftar-admin" class="nav-link <?= (current_url() == base_url('/daftar-admin')) ? 'active text-primary' : '' ?>">Daftar Admin</a>

          </nav>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link with-sub <?= (current_url() == base_url('/email/list')) ? 'active text-primary' : '' ?>">
            Mails Inbox
            <?php if ($unreadEmailCount > 0) : ?>
              <!-- Tooltip diterapkan pada badge yang ada -->
              <span class="badge bg-danger text-white rounded-circle mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Anda memiliki <?= $unreadEmailCount ?> email yang belum dibaca."><?= $unreadEmailCount ?></span>
            <?php endif; ?>
          </a>
          <nav class="az-menu-sub">
            <a href="/email/list" class="nav-link <?= (current_url() == base_url('/email/list')) ? 'active text-primary' : '' ?>">
              Daftar Email
              <?php if ($unreadEmailCount > 0) : ?>
                <!-- Tooltip diterapkan pada badge yang ada -->
                <span class="badge bg-danger text-white rounded-circle mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Anda memiliki <?= $unreadEmailCount ?> email yang belum dibaca."><?= $unreadEmailCount ?></span>
              <?php endif; ?>
            </a>
          </nav>
        </li>
        <li class="nav-item">
          <a href="/admin/logout" type="button" class="btn btn-primary"> Logout</a>
        </li>
      </ul>
    </div><!-- az-header-menu -->

  </div><!-- container -->
</div><!-- az-header -->