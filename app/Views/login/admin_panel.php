<div class="az-signin-wrapper">
    <div class="az-card-signin">
        <h1 class="az-logo text-primary">kaltech</h1>
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
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                </div><!-- form-group -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Log In</button>
            </form>
        </div><!-- az-signin-header -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->