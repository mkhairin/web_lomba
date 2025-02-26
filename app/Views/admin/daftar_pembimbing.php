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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <div class="modal fade" id="modal-lg-update<?= $pembimbing->id_pembimbing ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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
                                        <input type="hidden" name="id" id="id" value="<?= $pembimbing->id_pembimbing; ?>">
                                        <label for="id_sekolah">Sekolah</label>
                                        <select class="form-control select" id="id_sekolah" name="id_sekolah" style="width: 100%;" required>
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
                                        <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" value="<?= $pembimbing->nama_pembimbing; ?>" placeholder="Masukkan Nama Pembimbing" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Kolom Lomba -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_lomba">Kategori</label>
                                        <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <?php foreach ($dataLomba as $lomba) : ?>
                                                <option value="<?= $lomba->id_lomba; ?>"
                                                    <?= ($lomba->id_lomba == $pembimbing->id_lomba) ? 'selected' : ''; ?>>
                                                    <?= $lomba->nama; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Kolom No Handphone -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_handphone">No Handphone</label>
                                        <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="<?= $pembimbing->no_handphone ?>" placeholder="Masukkan No Handphone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>


<!-- Modal Delete -->
<?php foreach ($dataPembimbing as $data) : ?>
    <form action="/daftar-pembimbing/delete/<?= $data->id_pembimbing ?>">
        <?php csrf_field() ?>
        <div class="modal fade" id="modal-delete<?= $data->id_pembimbing ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <h1 class="mb-2 d-2">
                                <i class="bi bi-exclamation-triangle p-1 px-2"></i>
                            </h1>
                            <p>Apakah Kamu benar ingin menghapus data ini?</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
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

    <!-- Include SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('success')): ?>
                Swal.fire({
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success'); ?>',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0d6efd' // Warna biru
                });
            <?php elseif (session()->getFlashdata('error')): ?>
                Swal.fire({
                    title: 'Error!',
                    text: '<?= session()->getFlashdata('error'); ?>',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0d6efd' // Warna biru
                });
            <?php endif; ?>
        });
    </script>

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

    <h2 class="az-content-title">Daftar Pembimbing Tim/Peserta</h2>

    <div class="az-content-label mg-b-5">Informasi Pembimbing</div>
    <p class="mg-b-20">Data pembimbing yang mendampingi tim atau peserta dalam kompetisi.</p>



    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>
    </div>

    <br>

    <div class="table-responsive">
        <table id="example" class="table table-striped">
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
                        <td><?= $data->nama_pembimbing ?></td>
                        <td style="text-align: justify;">
                            <?= $data->nama_sekolah ?>
                        </td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->no_handphone ?></td>
                        <td>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-lg-update<?= $data->id_pembimbing ?>">Update</button>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                data-target="#modal-delete<?= $data->id_pembimbing ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>