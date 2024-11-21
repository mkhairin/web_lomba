        <!-- Modal Add -->
        <form action="/daftar-sponsor/insert" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Sponsor</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="nama_sponsor">Nama Sponsor</label>
                                            <input type="text" class="form-control" id="nama_sponsor"
                                                name="nama_sponsor" placeholder="Masukkan kategori" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo"
                                                placeholder="Masukkan deskripsi" required>
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
        <?php foreach ($dataSponsor as $data) : ?>
            <form action="/daftar-sponsor/update/<?= $data->id_sponsor ?>" method="post" enctype="multipart/form-data">
                <?php csrf_field() ?>
                <div class="modal fade" id="modal-lg-update<?= $data->id_sponsor ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Daftar Sponsor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="nama_sponsor">Nama Sponsor</label>
                                                <input type="text" class="form-control" id="nama_sponsor"
                                                    name="nama_sponsor" value="<?= $data->nama_sponsor ?>" required>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <input type="file" class="form-control" id="logo" name="logo"
                                                    value="<?= $data->logo ?>" required>
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
            <h2 class="az-content-title">Basic Tables</h2>

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
                            <th>Nama Sponsor</th>
                            <th>Logo Sponsor</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataSponsor as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_sponsor ?></td>
                                <td><img src="/img/sponsor/<?= $data->logo ?>" class="img-thumbnail" alt="Logo Sponsor"
                                        width="100px"></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-update<?= $data->id_sponsor ?>">Update</button>
                                    <a class="btn btn-dark btn-sm" href="/daftar-sponsor/delete/<?= $data->id_sponsor ?>"
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