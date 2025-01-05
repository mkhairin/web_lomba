<footer id="footer" class="footer">

  <div class="container">
    <div class="copyright text-center ">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">HIMA TRKJ 2024</strong> <span>All Rights Reserved</span></p>
    </div>
    <!-- <div class="social-links d-flex justify-content-center">
      <a href=""><i class="bi bi-twitter-x"></i></a>
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/hima_trkj_politala?igsh=MWY0MHlpaTkxNGM5MA=="><i class="bi bi-instagram"></i></a>
      <a href=""><i class="bi bi-linkedin"></i></a>
    </div> -->
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you've purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
      Designed by <a href="https://bootstrapmade.com/">@desainnya.ereenn</a>
    </div>
  </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/php-email-form/validate.js"></script>
<script src="assets/vendors/aos/aos.js"></script>
<script src="assets/vendors/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendors/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendors/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendors/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.7/dist/sweetalert2.min.js"></script>

<script>
  const form = document.querySelector('.php-email-form');
  const loading = form.querySelector('.loading');
  const successMessage = form.querySelector('.sent-message');
  const errorMessage = form.querySelector('.error-message');
  const submitButton = form.querySelector('button[type="submit"]');

  // Fungsi untuk menampilkan atau menyembunyikan loading
  function toggleLoading(isLoading) {
    loading.style.display = isLoading ? 'block' : 'none';
    submitButton.disabled = isLoading;
  }

  // Fungsi untuk menampilkan pesan error
  function showError(message) {
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';
  }

  // Fungsi untuk validasi form
  function validateForm(form) {
    const requiredFields = ['name', 'email', 'subject', 'message'];
    for (const field of requiredFields) {
      const input = form.elements[field];
      if (!input || !input.value.trim()) {
        showError(`${field} is required!`);
        return false;
      }
    }
    return true;
  }

  // Fungsi untuk menangani error
  function handleError(error) {
    toggleLoading(false);
    if (error.name === 'AbortError') {
      showError('Request timed out. Please try again later.');
    } else if (error.message === 'Failed to fetch') {
      showError('Network error. Please check your connection.');
    } else {
      showError('An unexpected error occurred: ' + error.message);
    }
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    toggleLoading(true); // Tampilkan loading
    successMessage.style.display = 'none'; // Sembunyikan pesan sukses
    errorMessage.style.display = 'none'; // Sembunyikan pesan error

    // Validasi form
    if (!validateForm(form)) {
      toggleLoading(false);
      return;
    }

    const formData = new FormData(form);

    // Tambahkan timeout untuk request
    const controller = new AbortController();
    const signal = controller.signal;

    setTimeout(() => controller.abort(), 10000); // Timeout setelah 10 detik

    fetch('/contact/send', {
      method: 'POST',
      body: formData,
      signal,
    })
      .then((response) => response.json())
      .then((data) => {
        toggleLoading(false); // Sembunyikan loading
        if (data.success) {
          successMessage.style.display = 'block'; // Tampilkan pesan sukses
          form.reset(); // Reset form setelah sukses
        } else {
          showError(data.error || 'Something went wrong. Please try again.');
        }
      })
      .catch(handleError); // Tangani error
  });
</script>



</body>

</html>