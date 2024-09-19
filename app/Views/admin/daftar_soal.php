<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Daftar Soal</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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

        <!-- Modal Add -->
        <form action="/daftar-lomba/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="lomba">Nama Lomba</label>
                                            <input type="text" class="form-control" id="lomba" name="lomba"
                                                placeholder="Masukkan nama lomba" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_soal">Link Soal</label>
                                            <input type="text" class="form-control" id="link_soal" name="link_soal"
                                                placeholder="Masukkan link soal" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
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

        <!-- Tombol tambah data -->
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Lomba</th>
                            <th>Link Soal</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tambahkan data statik -->
                        <tr>
                            <td>1</td>
                            <td>Programming</td>
                            <td><a href="#">Link Soal Programming</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Fotografi</td>
                            <td><a href="#">Link Soal Fotografi</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Videografi</td>
                            <td><a href="#">Link Soal Videografi</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
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