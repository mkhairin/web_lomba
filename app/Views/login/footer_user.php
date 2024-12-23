<script src="asset_azia/lib/jquery/jquery.min.js"></script>
<script src="asset_azia/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="asset_azia/lib/ionicons/ionicons.js"></script>
<script src="asset_azia/js/jquery.cookie.js" type="text/javascript"></script>
<script src="asset_azia/js/jquery.cookie.js" type="text/javascript"></script>

<script src="asset_azia/js/azia.js"></script>

<!-- Script untuk toggle password -->
<script>
  function togglePassword() {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }
</script>

<script>
  $(function() {
    'use strict'

  });
</script>
</body>

</html>