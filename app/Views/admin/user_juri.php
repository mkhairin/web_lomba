<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Juri</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Modal Add -->
        <form action="/juri/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Juri</h4>
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
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Masukkan Username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                placeholder="Masukkan Password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control select" id="role" name="role"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Role</option>
                                                <option value="juri">
                                                    Juri</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

        <!-- Modal Update -->
        <?php foreach ($dataJuri as $juri) : ?>
            <form action="/juri/update/<?= $juri->id_juri ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $juri->id_juri ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Daftar Juri</h4>
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
                                                <input type="text" class="form-control" name="username" id="username"
                                                    value="<?= $juri->username ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Masukkan password baru">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control select" id="role" name="role"
                                                    style="width: 100%;">
                                                    <option value="" disabled selected>Pilih Role</option>
                                                    <option value="juri">
                                                        Juri</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </form>
        <?php endforeach ?>

        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Juri</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive"> <!-- Add this wrapper -->
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Username</th>
                                <th>Password</th>

                                <th>Roles</th>
                                <th style="width: 200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataJuri as $juri) : ?>
                                <tr>
                                    <td><?= $juri->id_juri ?></td>
                                    <td><?= $juri->username ?></td>
                                    <td style="text-align: justify;">
                                        <?= substr($juri->password, 0, 10) . '...' ?>
                                    </td>
                                    <td><?= $juri->role ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modal-lg-update<?= $juri->id_juri ?>">Update</button>
                                        <a class="btn btn-outline-primary btn-sm" href="/juri/delete/<?= $juri->id_juri ?>"
                                            role="button">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- End of table-responsive wrapper -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->