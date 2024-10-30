<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b> Kaltech</a>
    </div>

    <?php $validation = \Config\Services::validation(); ?>

    <!-- Pesan sukses -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Pesan error general -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- /.login-logo -->
    <div class="card shadow-none">
        <div class="card-body login-card-body  rounded">
            <p class="login-box-msg">Jika anda admin silahkan login dengan username dan password yang benar</p>

            <form action="/admin_login/auth" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- 
              <p class="mb-1 mt-5">
                  <a href="forgot-password.html">I forgot my password</a>
              </p>
              <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
              </p> -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->