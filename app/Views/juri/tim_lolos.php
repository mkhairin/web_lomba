<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Tim Lolos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $validation = \Config\Services::validation(); ?>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>


        <!-- Modal Update for each submission -->
        <?php foreach ($dataSubmitTugas as $data) : ?>
            <form action="/juri-dashboard/tim-lolos/insert" method="post">
                <?= csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $data->id_submit_pengumpulan ?>" tabindex="-1" aria-labelledby="modal-lg-update-label<?= $data->id_submit_pengumpulan ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Penilaian</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" name="tim" value="<?= $data->tim?>">
                                    <input type="hidden" name="ketua" value="<?= $data->ketua?>">
                                    <input type="hidden" name="lomba" value="<?= $data->lomba?>">
                                    <input type="hidden" name="pembimbing" value="<?= $data->pembimbing?>">
                                    <input type="hidden" name="sekolah" value="<?= $data->sekolah?>">
                                    <input type="hidden" name="skor_nilai" value="<?= $data->skor_nilai?>">
                                    <div class="form-group">
                                        <label for="status">Status Penilaian</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option selected>Status Kelolosan</option>
                                            <option value="Belum Lolos">Belum Lolos</option>
                                            <option value="Lolos">Lolos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>


        <?php foreach ($dataSubmitTugas as $data) : ?>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg-update<?= $data->id_submit_pengumpulan ?>">
                Tambah Data
            </button>
        <?php endforeach; ?>
        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Tim Lolos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Tim</th>
                            <th>Kategori</th>
                            <th>Sekolah</th>
                            <th>Pembimbing</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataSubmitTugas as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= esc($data->tim) ?></td>
                                <td><?= esc($data->lomba) ?></td>
                                <td><?= esc($data->sekolah) ?></td>
                                <td><?= esc($data->pembimbing) ?></td>
                                <td><?= esc($data->tgl) ?></td>
                                <td><?= esc($data->jam) ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modal-lg-update<?= $data->id_submit_pengumpulan ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
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