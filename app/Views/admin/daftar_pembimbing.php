<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pembimbing</h1>
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
        <form action="/daftar-pembimbing/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Pembimbing</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id">
                                            <label for="status">Sekolah</label>
                                            <select class="form-control select" id="sekolah" name="id_sekolah"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Sekolah</option>
                                                <?php foreach ($dataSekolah as $data) : ?>
                                                    <option value="<?= $data->id_sekolah; ?>"><?= $data->nama_sekolah; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_pembimbing">Nama Pembimbing</label>
                                            <input type="text" class="form-control" id="nama_pembimbing"
                                                name="nama_pembimbing" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_lomba">Kategori</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Kategori Lomba</option>
                                                <?php foreach ($dataLomba as $data) : ?>
                                                    <option value="<?= $data->id_lomba; ?>"><?= $data->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_handphone">No Handphone</label>
                                            <input type="text" class="form-control" id="no_handphone"
                                                name="no_handphone" placeholder="Masukkan Nomor Hp" required>
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

        <!-- Modal Update -->
        <?php foreach ($dataPembimbing as $pembimbing) : ?>
            <form action="/daftar-pembimbing/update/<?= $pembimbing->id_pembimbing ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $pembimbing->id_pembimbing ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Daftar Pembimbing</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Kolom Sekolah -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id"
                                                    value="<?= $pembimbing->id_pembimbing; ?>">
                                                <label for="id_sekolah">Sekolah</label>
                                                <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                    style="width: 100%;">
                                                    <?php foreach ($dataSekolah as $sekolah) : ?>
                                                        <option value="<?= $sekolah->id_sekolah; ?>"
                                                            <?= ($sekolah->id_sekolah == $pembimbing->id_sekolah) ? 'selected' : ''; ?>>
                                                            <?= $sekolah->nama_sekolah; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kolom Nama Pembimbing -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_pembimbing">Nama Pembimbing</label>
                                                <input type="text" class="form-control" id="nama_pembimbing"
                                                    name="nama_pembimbing" value="<?= $pembimbing->nama_pembimbing; ?>"
                                                    placeholder="Masukkan Nama Pembimbing" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Kolom Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_lomba">Kategori</label>
                                                <select class="form-control select" id="id_lomba" name="id_lomba"
                                                    style="width: 100%;">
                                                    <option value="" disabled selected><?= $data->nama; ?></option>
                                                    <?php foreach ($dataLomba as $data) : ?>
                                                        <option value="<?= $data->id_lomba; ?>"><?= $data->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_handphone">No Handphone</label>
                                                <input type="text" class="form-control" id="no_handphone"
                                                    name="no_handphone" value="<?= $pembimbing->no_handphone ?>" required>
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


        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Juara</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Pembimbing</th>
                            <th>Sekolah</th>
                            <th>Lomba</th>
                            <th>No Handphone</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataPembimbing as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_sekolah ?></td>
                                <td style="text-align: justify;"><?= $data->nama_pembimbing ?>
                                </td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->no_handphone ?></td>
                                <td>

                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $data->id_pembimbing ?>"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <a class="btn btn-dark btn-sm"
                                        href="/daftar-pembimbing/delete/<?= $data->id_pembimbing ?>"
                                        role="button"><i
                                            class="bi bi-trash3-fill"></i></a>
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