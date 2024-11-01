<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Lomba</h1>
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
        <form action="/daftar-lomba/insert" method="post">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Kategori Lomba -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nama">Kategori</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Masukkan kategori" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Lomba -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="Masukkan deskripsi" required>
                                        </div>
                                    </div>
                                    <!-- Link Peraturan -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link_peraturan">Link</label>
                                            <input type="text" class="form-control" id="link_peraturan"
                                                name="link_peraturan" placeholder="Masukkan link aturan" required>
                                        </div>
                                    </div>
                                    <!-- Link Pendaftaran -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link_pendaftaran">Link</label>
                                            <input type="text" class="form-control" id="link_pendaftaran"
                                                name="link_pendaftaran" placeholder="Masukkan link pendaftaran" required>
                                        </div>
                                    </div>
                                    <!-- Tanggal Dibuka -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tgl_dibuka">Tgl Dibuka</label>
                                            <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka" required>
                                        </div>
                                    </div>
                                    <!-- Tanggal Ditutup -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tgl_ditutup">Tgl Ditutup</label>
                                            <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup" required>
                                        </div>
                                    </div>
                                    <!-- Status Lomba -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select" id="status" name="status"
                                                style="width: 100%;">
                                                <option value="Aktif" selected>Aktif</option>
                                                <option value="Non-Aktif">Non-Aktif</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Peraturan Lomba -->
                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="peraturan">Aturan</label>
                                            <textarea class="form-control" id="peraturan" rows="4" name="peraturan"
                                                placeholder="Masukkan aturan" required></textarea>
                                        </div>
                                    </div> -->
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
        <?php foreach ($dataLomba as $data) : ?>
            <form action="/daftar-lomba/update/<?= $data->id_lomba ?>" method="post">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $data->id_lomba ?>">
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
                                        <!-- Hidden Input for ID -->
                                        <input type="hidden" name="id" id="id" value="<?= $data->id_lomba ?>">

                                        <!-- Kategori Lomba -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama">Kategori</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="<?= $data->nama ?>" placeholder="Masukkan Kategori Lomba" required>
                                            </div>
                                        </div>
                                        <!-- Deskripsi Lomba -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                    value="<?= $data->deskripsi ?>" placeholder="Masukkan Deskripsi Lomba" required>
                                            </div>
                                        </div>
                                        <!-- Link Peraturan -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link_peraturan">Link Peraturan</label>
                                                <input type="text" class="form-control" id="link_peraturan"
                                                    name="link_peraturan" value="<?= $data->link_peraturan ?>"
                                                    placeholder="Masukkan link aturan" required>
                                            </div>
                                        </div>
                                        <!-- Link Pendaftaran -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link_pendaftaran">Link Pendaftaran</label>
                                                <input type="text" class="form-control" id="link_pendaftaran"
                                                    name="link_pendaftaran" value="<?= $data->link_pendaftaran ?>"
                                                    placeholder="Masukkan link pendaftaran" required>
                                            </div>
                                        </div>
                                        <!-- Tanggal Dibuka -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_dibuka">Tgl Dibuka</label>
                                                <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka"
                                                    value="<?= $data->tgl_dibuka ?>" required>
                                            </div>
                                        </div>
                                        <!-- Tanggal Ditutup -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_ditutup">Tgl Ditutup</label>
                                                <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup"
                                                    value="<?= $data->tgl_ditutup ?>" required>
                                            </div>
                                        </div>
                                        <!-- Status Lomba -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control select" id="status" name="status"
                                                    style="width: 100%;">
                                                    <option value="<?= $data->status ?>" selected><?= $data->status ?>
                                                    </option>
                                                    <option value="Non-Aktif">Non-Aktif</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Peraturan Lomba -->
                                        <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="peraturan">Aturan</label>
                                                <textarea class="form-control" rows="4" id="peraturan" name="peraturan"
                                                    placeholder="Masukkan Peraturan" required></textarea>
                                            </div>
                                        </div> -->
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
        <div class="card shadow-none border border-0 mb-5">
            <div class="card-header">
                <h3 class="card-title">Daftar Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Link Aturan</th>
                                <th>Link Pendaftaran</th>
                                <th>Tgl Buka</th>
                                <th>Tgl Tutup</th>
                                <th>Status</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($dataLomba as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td style="text-align: justify;">
                                        <?= $data->deskripsi ?>
                                    </td>
                                    <td><a href="<?= $data->link_peraturan ?>">Peraturan <?= $data->nama ?></a></td>
                                    <td><a href="<?= $data->link_pendaftaran ?>">Pendaftaran <?= $data->nama ?></a></td>
                                    <td><?= $data->tgl_dibuka ?></td>
                                    <td><?= $data->tgl_ditutup ?></td>
                                    <td><span class="badge rounded text-bg-primary bg-primary"
                                            style="opacity: 50%;"><?= $data->status ?></span></td>
                                    <td>

                                        <button type="button" class="btn btn-dark btn-sm rounded" data-toggle="modal"
                                            data-target="#modal-lg-update<?= $data->id_lomba ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <a class="btn btn-dark btn-sm rounded"
                                            href="/daftar-lomba/delete/<?= $data->id_lomba ?>" role="button"><i
                                                class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->