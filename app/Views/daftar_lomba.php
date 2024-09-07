<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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

        <!-- Modal Add -->
        <form action="/daftar-lomba/insert" method="post">
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
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Masukkan kategori">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="Masukkan deskripsi">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="url" class="form-control" id="link_peraturan" id="link_peraturan" name="link_peraturan"
                                                placeholder="Masukkan link">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tgl_dibuka">Tgl Dibuka</label>
                                            <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tgl_ditutup">Tgl Ditutup</label>
                                            <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" id="status" name="status" style="width: 100%;">
                                                <option selected="selected">Aktif</option>
                                                <option>Non-Aktif</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="aturan">Aturan</label>
                                            <textarea class="form-control" id="aturan" rows="4" id="peraturan" name="peraturan"
                                                placeholder="Masukkan aturan"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>


        <?php foreach ($dataLomba as $data) : ?>
            <!-- Modal Update -->
            <form action="/daftar-lomba/update/<?= $data->id_lomba ?>" method="post">
                <div class="modal fade" id="modal-lg-update<?= $data->id_lomba ?>">
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
                                        <input type="hidden" name="id" id="id">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="<?= $data->nama ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                    value="<?= $data->deskripsi ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="url" class="form-control" id="link_peraturan" id="link_peraturan" name="link_peraturan"
                                                    value="<?= $data->link_peraturan ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_dibuka">Tgl Dibuka</label>
                                                <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka" value="<?= $data->tgl_dibuka ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_ditutup">Tgl Ditutup</label>
                                                <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup" value="<?= $data->tgl_ditutup ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control select" id="status" name="status" style="width: 100%;">
                                                    <option selected="selected"><?= $data->status ?></option>
                                                    <option>Non-Aktif</option>
                                                    <option>Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="peraturan">Aturan</label>
                                                <textarea class="form-control" rows="4" id="peraturan" name="peraturan"
                                                    value="<?= $data->peraturan ?>"><?= $data->peraturan ?></textarea>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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



        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aturan</th>
                            <th>Link</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataLomba as $data) : ?>
                            <tr>
                                <td>1.</td>
                                <td><?= $data->nama ?></td>
                                <td style="text-align: justify;">
                                    <?= $data->deskripsi ?>
                                </td>
                                <td><?= $data->peraturan ?></td>
                                <td><?= $data->tgl_dibuka ?></td>
                                <td><?= $data->tgl_ditutup ?></td>
                                <td><span class="badge rounded-pill text-bg-primary bg-primary"
                                        style="opacity: 50%;"><?= $data->status ?></span></td>
                                <td>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $data->id_lomba ?>">Update</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modal-delete">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
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