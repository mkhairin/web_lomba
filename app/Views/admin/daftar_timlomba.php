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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ketua_tim">Ketua Tim</label>
                                    <input type="text" class="form-control" id="ketua_tim" name="ketua_tim"
                                        placeholder="Masukkan Nama Tim" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anggota">Nama Anggota</label>
                                    <input type="text" class="form-control" id="anggota" name="anggota"
                                        placeholder="Masukkan Nama Tim" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_ketua">No Ketua</label>
                                    <input type="text" class="form-control" id="no_ketua" name="no_ketua"
                                        placeholder="Masukkan Nama Tim" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ketua_tim">Ketua Tim</label>
                                        <input type="text" class="form-control" id="ketua_tim" name="ketua_tim"
                                            value="<?= $timLomba->ketua_tim ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anggota">Nama Anggota</label>
                                        <input type="text" class="form-control" id="anggota" name="anggota"
                                            value="<?= $timLomba->anggota ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_ketua">No Ketua</label>
                                        <input type="text" class="form-control" id="no_ketua" name="no_ketua"
                                            value="<?= $timLomba->no_ketua ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?php
$uri = service('uri');
$segments = $uri->getSegments();
?>


<div class="az-content-body pd-lg-l-40 d-flex flex-column">
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
    <h2 class="az-content-title">Daftar Tim Lomba</h2>

    <div class="az-content-label mg-b-5">Striped Rows</div>
    <p class="mg-b-20">Data tim yang berpartisipasi pada event.</p>

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
                    <th style="width: 10px">#</th>
                    <th>Nama Tim</th>
                    <th>Sekolah</th>
                    <th>Kategori</th>
                    <th>Pembimbing</th>
                    <th>Ketua</th>
                    <th>Anggota</th>
                    <th>No Ketua</th>
                    <th style="width: 200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataTimLomba as $timLomba) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $timLomba->nama_tim ?></td>
                        <td><?= $timLomba->nama_sekolah ?></td>
                        <td style="text-align: justify;">
                            <?= $timLomba->nama ?>
                        </td>
                        <td><?= $timLomba->nama_pembimbing ?></td>
                        <td><?= $timLomba->ketua_tim ?></td>
                        <td><?= $timLomba->anggota ?></td>
                        <td><?= $timLomba->no_ketua ?></td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                data-target="#modal-lg-update<?= $timLomba->id_tim_lomba ?>">Update</button>
                            <a class="btn btn-outline-primary btn-sm" href="/tim-lomba/delete/<?= $timLomba->id_tim_lomba ?>"
                                role="button">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>