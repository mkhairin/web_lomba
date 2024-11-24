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
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
<?php endforeach; ?>

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
    <h2 class="az-content-title">Daftar Pembimbing</h2>


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

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-lg-update<?= $data->id_pembimbing ?>">Update</button>
                            <a class="btn btn-outline-primary btn-sm"
                                href="/daftar-pembimbing/delete/<?= $data->id_pembimbing ?>"
                                role="button">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>