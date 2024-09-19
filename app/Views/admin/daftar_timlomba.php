<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Tim Lomba</h1>
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
        <form action="/tim-lomba/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Tim</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_tim">Nama Tim</label>
                                            <input type="text" class="form-control" id="nama_tim" name="nama_tim"
                                                placeholder="Masukkan Nama Tim" required>
                                        </div>
                                    </div>
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_sekolah">Sekolah</label>
                                            <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Sekolah</option>
                                                <?php foreach ($dataSekolah as $sekolah) : ?>
                                                <option value="<?= $sekolah->id_sekolah ?>">
                                                    <?= $sekolah->nama_sekolah ?></option>
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
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Link Peraturan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_pembimbing">Pembimbing</label>
                                            <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Pembimbing</option>
                                                <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                                <option value="<?= $pembimbing->id_pembimbing ?>">
                                                    <?= $pembimbing->nama_pembimbing ?></option>
                                                <?php endforeach; ?>
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

        <!-- Modal Update -->
        <?php foreach ($dataTimLomba as $timLomba) : ?>
        <form action="/tim-lomba/update/<?= $timLomba->id_tim_lomba ?>" method="post">
            <?= csrf_field() ?>
            <div class="modal fade" id="modal-lg-update<?= $timLomba->id_tim_lomba ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_tim">Nama Tim</label>
                                            <input type="text" class="form-control" id="nama_tim" name="nama_tim"
                                                value="<?= $timLomba->nama_tim ?>" required>
                                        </div>
                                    </div>
                                    <!-- Sekolah -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_sekolah">Sekolah</label>
                                            <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                style="width: 100%;" required>
                                                <option value="" disabled>Pilih Sekolah</option>
                                                <?php foreach ($dataSekolah as $sekolah) : ?>
                                                <option value="<?= $sekolah->id_sekolah ?>"
                                                    <?= ($timLomba->id_sekolah == $sekolah->id_sekolah) ? 'selected' : '' ?>>
                                                    <?= $sekolah->nama_sekolah ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_lomba">Kategori</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;" required>
                                                <option value="" disabled>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                <option value="<?= $lomba->id_lomba ?>"
                                                    <?= ($timLomba->id_lomba == $lomba->id_lomba) ? 'selected' : '' ?>>
                                                    <?= $lomba->nama ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Pembimbing -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_pembimbing">Pembimbing</label>
                                            <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                                style="width: 100%;" required>
                                                <option value="" disabled>Pilih Pembimbing</option>
                                                <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                                <option value="<?= $pembimbing->id_pembimbing ?>"
                                                    <?= ($timLomba->id_pembimbing == $pembimbing->id_pembimbing) ? 'selected' : '' ?>>
                                                    <?= $pembimbing->nama_pembimbing ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php endforeach; ?>



        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Tim Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sekolah</th>
                            <th>Kategori</th>
                            <th>Pembimbing</th>
                            <th>Nama Tim</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataTimLomba as $timLomba) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $timLomba->nama_sekolah ?></td>
                            <td style="text-align: justify;">
                                <?= $timLomba->nama ?>
                            </td>
                            <td><?= $timLomba->nama_pembimbing ?></td>
                            <td><?= $timLomba->nama_tim ?></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#modal-lg-update<?= $timLomba->id_tim_lomba ?>">Update</button>
                                <a class="btn btn-dark btn-sm" href="/tim-lomba/delete/<?= $timLomba->id_tim_lomba ?>"
                                    role="button">Delete</a>
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