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

        <!-- Modal Add -->
        <form action="/tim-lolos/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Tim Lolos</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_tim_lomba">Nama Tim</label>
                                            <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Tim</option>
                                                <?php foreach ($dataTimLomba as $timLomba) : ?>
                                                <option value="<?= $timLomba->id_tim_lomba ?>">
                                                    <?= $timLomba->nama_tim ?></option>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai">Nilai Skor</label>
                                            <input type="number" class="form-control" id="nilai" name="nilai"
                                                placeholder="Masukkan Nilai Akhir">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">status</label>
                                            <select class="form-control select" id="status" name="status"
                                                style="width: 100%;">
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value="Lolos">Lolos</option>
                                                <option value="Tidak Lolos">Tidak Lolos</option>
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

        <?php foreach ($dataTimLolos as $timlolos) : ?>
        <!-- Modal Update -->
        <form action="/tim-lolos/update/<?= $timlolos->id_tim_lolos ?>" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg-update<?= $timlolos->id_tim_lolos ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Tim Lolos</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_tim_lomba">Nama Tim</label>
                                            <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba"
                                                style="width: 100%;">
                                                <option value="" disabled>Pilih Tim</option>
                                                <?php foreach ($dataTimLomba as $timLomba) : ?>
                                                <option value="<?= $timLomba->id_tim_lomba ?>"
                                                    <?= ($timLomba->id_tim_lomba == $timlolos->id_tim_lomba) ? 'selected' : '' ?>>
                                                    <?= $timLomba->nama_tim ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_lomba">Kategori</label>
                                            <select class="form-control select" id="id_lomba" name="id_lomba"
                                                style="width: 100%;">
                                                <option value="" disabled>Pilih Kategori</option>
                                                <?php foreach ($dataLomba as $lomba) : ?>
                                                <option value="<?= $lomba->id_lomba ?>"
                                                    <?= ($lomba->id_lomba == $timlolos->id_lomba) ? 'selected' : '' ?>>
                                                    <?= $lomba->nama ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_sekolah">Sekolah</label>
                                            <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                                style="width: 100%;">
                                                <option value="" disabled>Pilih Sekolah</option>
                                                <?php foreach ($dataSekolah as $sekolah) : ?>
                                                <option value="<?= $sekolah->id_sekolah ?>"
                                                    <?= ($sekolah->id_sekolah == $timlolos->id_sekolah) ? 'selected' : '' ?>>
                                                    <?= $sekolah->nama_sekolah ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_pembimbing">Pembimbing</label>
                                            <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                                style="width: 100%;">
                                                <option value="" disabled>Pilih Pembimbing</option>
                                                <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                                <option value="<?= $pembimbing->id_pembimbing ?>"
                                                    <?= ($pembimbing->id_pembimbing == $timlolos->id_pembimbing) ? 'selected' : '' ?>>
                                                    <?= $pembimbing->nama_pembimbing ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai">Nilai Skor</label>
                                            <input type="number" class="form-control" id="nilai" name="nilai"
                                                value="<?= $timlolos->nilai ?>" placeholder="Masukkan Nilai Akhir">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select" id="status" name="status"
                                                style="width: 100%;">
                                                <option value="" disabled>Pilih Status</option>
                                                <option value="Lolos"
                                                    <?= ($timlolos->status == 'Lolos') ? 'selected' : '' ?>>Lolos
                                                </option>
                                                <option value="Tidak Lolos"
                                                    <?= ($timlolos->status == 'Tidak Lolos') ? 'selected' : '' ?>>Tidak
                                                    Lolos</option>
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
        <?php endforeach; ?>


        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

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
                        <?php foreach ($dataTimLolos as $timLolos) : ?>
                        <tr>
                            <td>1</td>
                            <td><?= $timLolos->nama_tim ?></td>
                            <td style="text-align: justify;">
                                <?= $timLolos->nama ?>
                            </td>
                            <td><?= $timLolos->nama_sekolah ?></td>
                            <td><?= $timLolos->nama_pembimbing ?></td>
                            <td><?= $timLolos->nilai ?></td>
                            <td>Lolos</td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#modal-lg-update<?= $timLolos->id_tim_lolos ?>">Update</button>
                                <a class="btn btn-dark btn-sm"
                                    href="/daftar-lolos/delete/<?= $timLolos->id_tim_lolos ?>" role="button">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
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