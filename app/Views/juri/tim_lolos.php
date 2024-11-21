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
                            <th>Ketua</th>
                            <th>Kategori</th>
                            <th>Pembimbing</th>
                            <th>Sekolah</th>
                            <th>Nilai Skor</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataTimLolosNew as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= esc($data->tim) ?></td>
                                <td><?= esc($data->ketua) ?></td>
                                <td><?= esc($data->lomba) ?></td>
                                <td><?= esc($data->pembimbing) ?></td>
                                <td><?= esc($data->sekolah) ?></td>
                                <td><?= esc($data->skor_nilai) ?></td>
                                <td><?= esc($data->status) ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modal-lg-update<?= $data->id_tim_lolos ?>">
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