<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Modal Add -->
        <form action="/user/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_tim_lomba">Nama Tim</label>
                                            <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba" style="width: 100%;">
                                                <option value="" disabled selected>Pilih Tim</option>
                                                <?php foreach ($dataTimLomba as $timLomba) : ?>
                                                    <option value="<?= $timLomba->id_tim_lomba ?>"><?= $timLomba->nama_tim ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_sekolah">Sekolah</label>
                                            <select class="form-control select" id="id_sekolah" name="id_sekolah" style="width: 100%;">
                                                <option value="" disabled selected>Pilih Sekolah</option>
                                                <?php foreach ($dataSekolah as $sekolah) : ?>
                                                    <option value="<?= $sekolah->id_sekolah ?>"><?= $sekolah->nama_sekolah ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Deskripsi Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_lomba">Kategori</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;">
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                    <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roles">Role</label>
                                            <select class="form-control select" id="roles" name="roles" style="width: 100%;">
                                                <option value="" disabled selected>Pilih Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

        <!-- Modal Update -->
        <?php foreach ($dataUsers as $user) : ?>
            <form action="/user/update/<?= $user->id_user ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $user->id_user ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" value="<?= esc($user->username) ?>" placeholder="Masukkan Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" name="password" id="password" value="<?= esc($user->password) ?>" placeholder="Masukkan Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_tim_lomba">Nama Tim</label>
                                                <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba" style="width: 100%;">
                                                    <option value="" disabled>Pilih Tim</option>
                                                    <?php foreach ($dataTimLomba as $timLomba) : ?>
                                                        <option value="<?= $timLomba->id_tim_lomba ?>" <?= ($timLomba->id_tim_lomba == $user->id_tim_lomba) ? 'selected' : '' ?>>
                                                            <?= $timLomba->nama_tim ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kategori Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_sekolah">Sekolah</label>
                                                <select class="form-control select" id="id_sekolah" name="id_sekolah" style="width: 100%;">
                                                    <option value="" disabled>Pilih Sekolah</option>
                                                    <?php foreach ($dataSekolah as $sekolah) : ?>
                                                        <option value="<?= $sekolah->id_sekolah ?>" <?= ($sekolah->id_sekolah == $user->id_sekolah) ? 'selected' : '' ?>>
                                                            <?= $sekolah->nama_sekolah ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Deskripsi Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_lomba">Kategori</label>
                                                <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;">
                                                    <option value="" disabled>Pilih Kategori</option>
                                                    <?php foreach ($dataLomba as $lomba) : ?>
                                                        <option value="<?= $lomba->id_lomba ?>" <?= ($lomba->id_lomba == $user->id_lomba) ? 'selected' : '' ?>>
                                                            <?= $lomba->nama ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Deskripsi Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="roles">Role</label>
                                                <select class="form-control select" id="roles" name="roles" style="width: 100%;">
                                                    <option value="" disabled>Pilih Role</option>
                                                    <option value="admin" <?= ($user->roles == 'admin') ? 'selected' : '' ?>>Admin</option>
                                                    <option value="user" <?= ($user->roles == 'user') ? 'selected' : '' ?>>User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </form>
        <?php endforeach; ?>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Sekolah</th>
                            <th>Tim</th>
                            <th>Kategori Lomba</th>
                            <th>Roles</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataUsers as $user) : ?>
                            <tr>
                                <td>1</td>
                                <td><?= $user->username ?></td>
                                <td style="text-align: justify;">
                                    <?= $user->password ?>
                                </td>
                                <td><?= $user->nama_sekolah ?></td>
                                <td><?= $user->nama_tim ?></td>
                                <td><?= $user->nama ?></td>
                                <td><?= $user->roles ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $user->id_user ?>">Update</button>
                                    <a class="btn btn-danger btn-sm" href="/user/delete/<?= $user->id_user ?>" role="button">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->