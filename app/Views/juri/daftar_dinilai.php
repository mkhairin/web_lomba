<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Penilaian</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end mt-3">
                    <ul>
                        <li>
                            <h5 class="mx-2"><?= $tanggalLengkap ?></h5>
                        </li>
                        <li>
                            <p>Jam : <?= $jamSekarang ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
            <form action="/juri-dashboard/update/<?= $data->id_submit_pengumpulan ?>" method="post">
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
                                    <div class="form-group">
                                        <label for="status_penilaian">Status Penilaian</label>
                                        <select class="form-control" id="status_penilaian" name="status_penilaian" required>
                                            <option value="" selected><?= $data->status_penilaian ?></option>
                                            <option value="Belum Dinilai" <?= ($data->status_penilaian == 'Belum Dinilai') ? 'selected' : '' ?>>Belum Dinilai</option>
                                            <option value="Sudah Dinilai" <?= ($data->status_penilaian == 'Sudah Dinilai') ? 'selected' : '' ?>>Sudah Dinilai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>

        <!-- Submissions Table -->
        <div class="card shadow-none border-0 mb-5">
            <div class="card-header">
                <h3 class="card-title">Daftar Penilaian</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tim</th>
                            <th>Link Tugas</th>
                            <th>Status Pengumpulan</th>
                            <th>Status Penilaian</th>
                            <th>Tgl</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataSubmitTugas as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= esc($data->tim) ?></td>
                                <td><a href="<?= esc($data->link_tugas) ?>" target="_blank"><?= esc($data->link_tugas) ?></a></td>
                                <td><?= esc($data->status_pengumpulan) ?></td>
                                <td><?= esc($data->status_penilaian) ?></td>
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
        </div>
    </section>
</div>