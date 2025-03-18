<div class="az-signin-wrapper">
    <div class="az-card-signin">
        <h1 class="az-logo text-primary">kaltek</h1>
        <div class="az-signin-header">
            <h2 class="text-primary">Selamat Datang Admin</h2>
            <h4>Please log in to continue</h4>
            <p>Jika kamu <b class="text-primary">Admin</b> silahkan Login jika tidak jangan masuk!!!</p>

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

            <form action="/admin_login/auth" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username"
                        value="<?= isset($_COOKIE['remember_username']) ? esc($_COOKIE['remember_username']) : ''; ?>">
                </div><!-- form-group -->
                <div class="form-group position-relative">
                    <label>Password</label>
                    <!-- Tampilkan password dari cookie jika ada -->
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password"
                        value="<?= isset($_COOKIE['remember_password']) ? esc($_COOKIE['remember_password']) : ''; ?>">
                    <!-- Tombol toggle password -->
                    <span class="password-toggle" onclick="togglePassword()" style="cursor: pointer; position: absolute; right: 10px; top: 38px;">
                        <i id="toggleIcon" class="fa fa-eye"></i>
                    </span>
                </div><!-- form-group -->

                <!-- Checkbox Remember Me -->
                <div class="form-check">
                    <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input"
                        <?= isset($_COOKIE['remember_username']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div><!-- form-check -->

                <button type="submit" class="btn btn-primary btn-block mb-4">Log In</button>
            </form>
        </div><!-- az-signin-header -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->