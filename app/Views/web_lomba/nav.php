<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="/" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <img src="<?= base_url('/img/logo/logo.webp') ?>" class="mx-2" alt="Logo-Image" style="width: 23px;">
      <h1 class="sitename">Kaltek</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home<br></a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Kategori</a></li>
        <li><a href="/team">Team</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <?php foreach ($dataLombaFirst as $lomba) : ?>
      <a class="btn-getstarted" href="<?= $lomba->link_pendaftaran ?>" target="_blank">Daftar Sekarang</a>
    <?php endforeach; ?>

  </div>
</header>