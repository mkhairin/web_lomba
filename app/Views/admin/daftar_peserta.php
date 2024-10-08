<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Peserta</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php $validation = \Config\Services::validation(); ?>

        <?php if ($validation->getErrors()): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Modal Add -->
        <form action="/daftar-peserta/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Peserta</h4>
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
                                            <label for="id_lomba">Kategori Lomba</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;">
                                                <option value="" selected>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                    <option value="<?= $lomba->id_lomba; ?>"><?= $lomba->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_pembimbing">Pembimbing</label>
                                            <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                                style="width: 100%;">
                                                <option value="" selected>Pilih Pembimbing</option>
                                                <?php foreach ($dataPembimbing as $data) : ?>
                                                    <option value="<?= $data->id_pembimbing; ?>">
                                                        <?= $data->nama_pembimbing; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_sekolah">Sekolah</label>
                                            <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                style="width: 100%;">
                                                <option value="" selected>Pilih Sekolah</option>
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
                                            <label for="id_tim_lomba">Tim Lomba</label>
                                            <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba"
                                                style="width: 100%;">
                                                <option value="" selected>Pilih Tim</option>
                                                <?php foreach ($dataTimLomba as $data) : ?>
                                                    <option value="<?= $data->id_tim_lomba; ?>"><?= $data->nama_tim; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_peserta">Nama Peserta</label>
                                            <input type="text" class="form-control" id="nama_peserta"
                                                name="nama_peserta" placeholder="Masukkan Nama Peserta" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_handphone">No Handphone</label>
                                            <input type="text" class="form-control" id="no_handphone"
                                                name="no_handphone" placeholder="Masukkan No Peserta" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
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
        <?php foreach ($dataPeserta as $data) : ?>
            <form action="/daftar-peserta/update/<?= $data->id_peserta ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $data->id_peserta ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Daftar Peserta</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Kolom Kategori Lomba -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="<?= $data->id_peserta; ?>">
                                                <label for="id_lomba">Kategori Lomba</label>
                                                <select class="form-control select" id="id_lomba" name="id_lomba"
                                                    style="width: 100%;" required>
                                                    <?php foreach ($dataLomba as $lomba) : ?>
                                                        <option value="<?= $lomba->id_lomba; ?>"
                                                            <?= ($lomba->id_lomba == $data->id_lomba) ? 'selected' : ''; ?>>
                                                            <?= $lomba->nama; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kolom Pembimbing -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_pembimbing">Pembimbing</label>
                                                <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                                    style="width: 100%;" required>
                                                    <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                                        <option value="<?= $pembimbing->id_pembimbing; ?>"
                                                            <?= ($pembimbing->id_pembimbing == $data->id_pembimbing) ? 'selected' : ''; ?>>
                                                            <?= $pembimbing->nama_pembimbing; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kolom Sekolah -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_sekolah">Sekolah</label>
                                                <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                    style="width: 100%;" required>
                                                    <?php foreach ($dataSekolah as $sekolah) : ?>
                                                        <option value="<?= $sekolah->id_sekolah; ?>"
                                                            <?= ($sekolah->id_sekolah == $data->id_sekolah) ? 'selected' : ''; ?>>
                                                            <?= $sekolah->nama_sekolah; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_tim_lomba">Tim Lomba</label>
                                                <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba"
                                                    style="width: 100%;">
                                                    <option value="" selected>Pilih Tim</option>
                                                    <?php foreach ($dataTimLomba as $dataTim) : ?>
                                                        <option value="<?= ($dataTim->id_tim_lomba == $data->id_tim_lomba) ? 'selected' : ''; ?>"><?= $dataTim->nama_tim; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kolom Nama Peserta -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama_peserta">Nama Peserta</label>
                                                <input type="text" class="form-control" id="nama_peserta"
                                                    name="nama_peserta" placeholder="Masukkan Nama Peserta"
                                                    value="<?= $data->nama_peserta; ?>" required>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_handphone">No Handphone</label>
                                                <input type="text" class="form-control" id="no_handphone"
                                                    name="no_handphone" placeholder="Masukkan No Peserta" value="<?= $data->no_handphone; ?>" required>
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
                <h3 class="card-title">Daftar Peserta</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Peserta</th>
                            <th>Pembimbing</th>
                            <th>Sekolah</th>
                            <th>Lomba</th>
                            <th>Tim</th>
                            <th>No Handphone</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataPeserta as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_peserta ?></td>
                                <td><?= $data->nama_pembimbing ?></td>
                                <td><?= $data->nama_sekolah ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->nama_tim ?></td>
                                <td><?= $data->no_handphone ?></td>
                                <td>

                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $data->id_peserta ?>"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <a class="btn btn-dark btn-sm" href="/daftar-peserta/delete/<?= $data->id_peserta ?>"
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