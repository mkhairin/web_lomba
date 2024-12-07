<footer id="footer" class="footer">

  <div class="container">
    <div class="copyright text-center ">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">HIMA TRKJ 2024</strong> <span>All Rights Reserved</span></p>
    </div>
    <div class="social-links d-flex justify-content-center">
      <a href=""><i class="bi bi-twitter-x"></i></a>
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/hima_trkj_politala?igsh=MWY0MHlpaTkxNGM5MA=="><i class="bi bi-instagram"></i></a>
      <a href=""><i class="bi bi-linkedin"></i></a>
    </div>
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
  // JavaScript to handle loading and success messages
  const form = document.querySelector('.php-email-form');
  const loading = form.querySelector('.loading');
  const successMessage = form.querySelector('.sent-message');
  const errorMessage = form.querySelector('.error-message');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    loading.style.display = 'block'; // Show loading
    successMessage.style.display = 'none'; // Hide success message
    errorMessage.style.display = 'none'; // Hide error message

    // Use AJAX to submit the form data
    const formData = new FormData(form);

    fetch('/contact/send', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        loading.style.display = 'none'; // Hide loading
        if (data.success) {
          successMessage.style.display = 'block'; // Show success message
        } else {
          errorMessage.textContent = data.error || 'Something went wrong. Please try again.';
          errorMessage.style.display = 'block'; // Show error message
        }
      })
      .catch(error => {
        loading.style.display = 'none'; // Hide loading
        errorMessage.textContent = 'An error occurred: ' + error;
        errorMessage.style.display = 'block'; // Show error message
      });
  });
</script>

</body>

</html>