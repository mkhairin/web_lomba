<!-- Modal Add Deadline -->
<form action="/juri-dashboard/daftar-deadline/insert" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Deadline</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <!-- ID Lomba -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_lomba">Kategori Lomba</label>
                                    <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;" required>
                                        <option value="" disabled selected>Pilih Kategori Lomba</option>
                                        <?php foreach ($dataLomba as $lomba) : ?>
                                            <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Deadline -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Deskripsi -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tambahkan deskripsi tugas (opsional)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>



<?php
$uri = service('uri');
$segments = $uri->getSegments();
?>

<div class="az-content-body pd-lg-l-40 d-flex flex-column">


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


    <div class="az-content-breadcrumb">
        <span><a href="<?= base_url('/') ?>">Home</a></span>
        <?php if (!empty($segments)): ?>
            <?php foreach ($segments as $index => $segment): ?>
                <?php
                // Ubah segmen URL menjadi label yang lebih deskriptif
                $label = ucfirst(str_replace('-', ' ', $segment));
                $url = base_url(implode('/', array_slice($segments, 0, $index + 1)));
                ?>
                <span>
                    <?php if ($index + 1 < count($segments)): ?>
                        <a href="<?= $url ?>"><?= $label ?></a>
                    <?php else: ?>
                        <?= $label ?>
                    <?php endif; ?>
                </span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <h2 class="az-content-title">Daftar Deadline Tugas</h2>

    <div class="az-content-label mg-b-5">Tabel Daftar Penilaian</div>
    <p class="mg-b-20">Data tim yang sudah dinilai oleh para Juri.</p>

    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>
    </div>

    <br>

    <div class="table-responsive">
        <table id="example1" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Deadline/th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>