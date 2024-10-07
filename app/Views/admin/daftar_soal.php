<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Daftar Soal Lomba</h1>
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
        <form action="/daftar-soal/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Soal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="id_soal" id="id_soal">
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_lomba">Kategori</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;">
                                                <option value="Aktif" selected>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                    <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Link Peraturan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_soal">Link Soal</label>
                                            <input type="text" class="form-control" id="link_soal"
                                                name="link_soal" placeholder="Masukkan link soal">
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

        <?php foreach ($dataSoal as $soal) : ?>
            <!-- Modal Update -->
            <form action="/daftar-soal/update/<?= $soal->id_soal ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $soal->id_soal ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Daftar Soal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="id_soal" id="id_soal">
                                        <!-- Kategori Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_lomba">Kategori</label>
                                                <select class="form-control select" id="id_lomba" name="id_lomba"
                                                    style="width: 100%;">
                                                    <option value="Aktif" selected>Pilih Kategori</option>
                                                    <?php foreach ($dataLomba as $lomba) : ?>
                                                        <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Link Peraturan -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link_soal">Link Soal</label>
                                                <input type="text" class="form-control" id="link_soal"
                                                    name="link_soal" value="<?= $soal->link_soal ?>">
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
        <?php endforeach; ?>

        <!-- Tombol tambah data -->
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Soal Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kategori</th>
                            <th>Link Soal</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tambahkan data statik -->
                        <?php $i = 1; ?>
                        <?php foreach ($dataSoal as $soal) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $soal->nama ?></td>
                                <td><a href="<?= $soal->link_soal ?>">Link Soal <?= $soal->nama ?></a></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $soal->id_soal ?>"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <a class="btn btn-dark btn-sm" href="/daftar-soal/delete/<?= $soal->id_soal ?>" role="button"><i class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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