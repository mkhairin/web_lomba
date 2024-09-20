<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Daftar Link Pengumpulan</h1>
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
        <form action="/daftar-pengumpulan/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Pengumpulan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="id_pengumpulan" id="id_pengumpulan">
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link_pengumpulan">Link Pengumpulan</label>
                                            <input type="text" class="form-control" id="link_pengumpulan"
                                                name="link_pengumpulan" placeholder="Masukkan link pengumpulan">
                                        </div>
                                    </div>
                                    <!-- Status Pengumpulan -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select" id="status" name="status"
                                                style="width: 100%;">
                                                <option value="Aktif" selected>Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non-Aktif">Non-Aktif</option>
                                                <option value="Pending">Pending</option>
                                            </select>
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
                <h3 class="card-title">Daftar Pengumpulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kategori</th>
                            <th>Link Pengumpulan</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tambahkan data statik -->
                        <?php $i = 1; ?>
                        <?php foreach ($dataPengumpulan as $pengumpulan) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $pengumpulan->nama ?></td>
                                <td><a href="<?= $pengumpulan->link_pengumpulan ?>">Link Soal <?= $pengumpulan->nama ?></a></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                        Update</button>
                                    <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                        Delete</button>
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