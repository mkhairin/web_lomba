<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Kaltek <?= $year = date('Y') ?>: Tantang Dirimu di Kompetisi IT SMK/SMA</h1>
          <p>Jangan lewatkan kesempatan untuk berkompetisi dengan yang terbaik di bidang teknologi. Kembangkan potensimu sekarang!</p>
          <div class="d-flex">
            <?php foreach($dataLombaFirst as $lomba) : ?>
            <a href="<?= $lomba->link_pendaftaran ?>" target="_blank"  class="btn-get-started">Daftar Sekarang</a>
            <?php endforeach; ?>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- Clients Section -->
  <section id="clients" class="clients section light-background  pb-0">

    <div class="container fl" data-aos="fade-up">
      <marquee behavior="" direction="">
        <div class="col-12 d-flex flex-row justify-content-evenly">
          <p>Kesuksesan dimulai dari keberanian untuk mencoba. Tunjukkan potensi terbaikmu di Kaltek <?= $year = date('Y') ?>!</p> <i class="bi bi-asterisk px-3"></i>
          <p>Setiap tantangan adalah kesempatan untuk berkembang. Jadilah bintang di dunia IT dengan berkompetisi di Kaltek!</p> <i class="bi bi-asterisk px-3"></i>
          <p>Jangan takut gagal, karena kegagalan adalah bagian dari proses menuju keberhasilan. Kaltek adalah langkah pertamamu menuju masa depan gemilang.</p> <i class="bi bi-asterisk px-3"></i>
          <p>Tidak ada batasan untuk kreativitas dan inovasi. Kaltek adalah tempatmu untuk mengubah ide menjadi prestasi nyata!</p> <i class="bi bi-asterisk px-3"></i>
        </div>
      </marquee>
    </div>

  </section><!-- /Clients Section -->

  <!-- About Section -->
  <section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>About Us</h2>
      <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-5">

        <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
          <h3>Kaltek: Ajang Inovasi dan Kreativitas Generasi Muda di Dunia IT</h3>
          <p>
            Kaltek adalah kompetisi teknologi tahunan yang diselenggarakan oleh HIMA TRKJ. Kami menghadirkan platform untuk siswa SMK/SMA mengeksplorasi kemampuan mereka dalam bidang Mikrotik, pemrograman, dan desain grafis. Dengan semangat inovasi dan kolaborasi, Kaltek menjadi tempat berkembangnya talenta muda di dunia IT. buatkan headline untuk teks ini
          </p>
          <a href="#" class="about-btn align-self-center align-self-xl-start"><span>About us</span> <i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">

            <div class="col-md-6 icon-box position-relative">
              <i class="bi bi-briefcase"></i>
              <h4><a href="" class="stretched-link">Kategori Lomba Beragam</a></h4>
              <p>Tantang dirimu di tiga bidang kompetisi: Mikrotik, pemrograman, dan desain grafis.</p>
            </div><!-- Icon-Box -->

            <div class="col-md-6 icon-box position-relative">
              <i class="bi bi-gem"></i>
              <h4><a href="" class="stretched-link">Penghargaan Bergengsi</a></h4>
              <p>Dapatkan trofi, hadiah menarik, dan pengakuan atas prestasimu.</p>
            </div><!-- Icon-Box -->

            <div class="col-md-6 icon-box position-relative">
              <i class="bi bi-broadcast"></i>
              <h4><a href="" class="stretched-link">Jejaring Teknologi</a></h4>
              <p>Bangun koneksi dengan peserta lain dan para profesional di bidang IT.</p>
            </div><!-- Icon-Box -->

            <div class="col-md-6 icon-box position-relative">
              <i class="bi bi-easel"></i>
              <h4><a href="" class="stretched-link">Beatae veritatis</a></h4>
              <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
            </div><!-- Icon-Box -->

          </div>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->

  <!-- Stats Section -->
  <section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 align-items-center">

        <div class="col-lg-5">
          <img src="assets/img/stats-img.svg" alt="" class="img-fluid">
        </div>

        <div class="col-lg-7">

          <div class="row gy-4">

            <div class="col-lg-6">
              <div class="stats-item d-flex">
                <i class="bi bi-trophy flex-shrink-0"></i>
                <div>
                  <h1 class="fw-bold">Juara 1</h1>
                  <p><strong>Performance Excellence</strong> <span>mencapai hasil terbaik melalui keterampilan dan dedikasi yang luar biasa</span></p>
                </div>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-6">
              <div class="stats-item d-flex">
                <i class="bi bi-code-slash flex-shrink-0"></i>
                <div>
                  <h1 class="fw-bold">Juara 2</h1>
                  <p><strong>Innovative Solutions</strong> <span>berhasil menciptakan solusi kreatif yang mengesankan dalam kompetisi</span></p>
                </div>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-6">
              <div class="stats-item d-flex">
                <i class="bi bi-palette flex-shrink-0"></i>
                <div>
                  <h1 class="fw-bold">Juara 3</h1>
                  <p><strong>Creative Excellence</strong> <span>terpilih sebagai juara ketiga berkat karya yang penuh inovasi dan kreativitas</span></p>
                </div>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </div>

    </div>

  </section><!-- /Stats Section -->

  <!-- Services Section -->
  <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Kategori Lomba</h2>
      <p>Kaltek <?= $year = date('Y') ?> menghadirkan berbagai kategori lomba untuk pelajar SMK/SMA yang ingin menunjukkan kemampuan terbaik mereka di bidang teknologi informasi. </p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">
        <?php foreach ($dataLomba as $lomba) : ?>
          <div class="col-xl-3 col-md-6 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <i class="bi bi-activity"></i>
              <h4><a href="" class="stretched-link"><?= $lomba->nama ?></a></h4>
              <p><?= $lomba->deskripsi ?></p>
            </div>
            <a href="<?= $lomba->link_pendaftaran ?>" target="_blank" class="btn-get-started mt-3">Link Pendaftaran <i class="bi bi-chevron-right"></i></a>
          </div><!-- End Service Item -->
        <?php endforeach; ?>

      </div>

    </div>

  </section>
  <!-- /Services Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Sponsor</h2>
      <p>Melalui dukungan Anda, Kaltek dapat terus menjadi ajang kompetisi yang mempersiapkan pelajar SMK/SMA untuk menjadi ahli teknologi masa depan.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <?php foreach ($dataSponsor as $sponsor) : ?>
          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <img src="<?= base_url('img/sponsor/' . $sponsor->logo) ?>" class="img-thumbnail" alt="Sponsor Picture" width="50">
              <h3 class="mx-2"><a href="" class="stretched-link"><?= $sponsor->nama_sponsor ?></a></h3>
            </div>
          </div><!-- End Feature Item -->
        <?php endforeach; ?>

      </div>

    </div>

  </section><!-- /Features Section -->

  <!-- Faq Section -->
  <section id="faq" class="faq section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Frequently Asked Questions</h2>
      <p>Jawaban atas pertanyaan umum seputar kompetisi IT terbesar untuk pelajar SMK/SMA.</p>
    </div><!-- End Section Title -->

    <div class="container">
      <?php foreach ($dataPertanyaan as $data) : ?>
        <div class="row faq-item" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4><?= $data->questions ?></h4>
          </div>
          <div class="col-lg-7">
            <p>
              <?= $data->answers ?>
            </p>
          </div>
        </div><!-- End F.A.Q Item-->
      <?php endforeach; ?>

    </div>

  </section><!-- /Faq Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact</h2>
      <p>Hubungi kami untuk informasi lebih lanjut atau bantuan seputar kompetisi.</p>
    </div><!-- End Section Title -->

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-5">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Alamat</h3>
              <p>Jl. Ahmad Yani No.Km.06, Pemuda, Kec. Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70815</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>info@example.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="col-lg-7">
          <?php $validation = \Config\Services::validation(); ?>

          <!-- Contact Form -->
          <form action="/contact/send" method="post" class="php-email-form">
            <?= csrf_field(); ?>
            <div class="row gy-4">

              <!-- Display Flashdata Notification -->
              <?php if (session()->getFlashdata('message')) : ?>
                <script>
                  Swal.fire({
                    icon: '<?= session()->getFlashdata('type'); ?>',
                    title: '<?= session()->getFlashdata('message'); ?>',
                    showConfirmButton: true
                  }).then(function() {
                    // Reload the page after 5 seconds
                    setTimeout(function() {
                      location.reload(); // Reload the page after 5 seconds
                    }, 5000);
                  });
                </script>
              <?php endif; ?>

              <!-- Name Field -->
              <div class="col-md-6">
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required="">
                <!-- Display validation error for name -->
                <?php if ($validation->hasError('name')): ?>
                  <div class="error"><?= $validation->getError('name'); ?></div>
                <?php endif; ?>
              </div>

              <!-- Email Field -->
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                <!-- Display validation error for email -->
                <?php if ($validation->hasError('email')): ?>
                  <div class="error"><?= $validation->getError('email'); ?></div>
                <?php endif; ?>
              </div>

              <!-- Subject Field -->
              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                <!-- Display validation error for subject -->
                <?php if ($validation->hasError('subject')): ?>
                  <div class="error"><?= $validation->getError('subject'); ?></div>
                <?php endif; ?>
              </div>

              <!-- Message Field -->
              <div class="col-md-12">
                <textarea class="form-control" name="message" id="message" rows="6" placeholder="Message" required=""></textarea>
                <!-- Display validation error for message -->
                <?php if ($validation->hasError('message')): ?>
                  <div class="error"><?= $validation->getError('message'); ?></div>
                <?php endif; ?>
              </div>

              <input type="hidden" name="tgl" id="tgl" value="<?= $tanggalLengkap ?>">

              <input type="hidden" name="jam" id="jam" value="<?= $jamSekarang ?>">

              <!-- Submit Button -->
              <div class="col-md-12 text-center">
                <div class="loading" style="display:none;">Loading...</div>
                <div class="error-message" style="display:none;"></div>
                <div class="sent-message" style="display:none;">Your message has been sent. Thank you!</div>
                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>

        </div><!-- End Contact Form -->



      </div>

    </div>

  </section><!-- /Contact Section -->

</main>