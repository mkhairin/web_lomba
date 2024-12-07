        <!-- Modal Add Deadline -->
        <form action="" method="">
            <?= csrf_field() ?>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-dashboard-five">
                                <div class="card-header">
                                    <h6 class="card-title">Total Data Tim</h6>
                                    <span class="card-text">Menampilkan jumlah total tim yang terdaftar dalam kompetisi, baik yang lolos maupun yang tidak lolos seleksi.</span>
                                </div><!-- card-header -->
                                <div class="card-body row row-sm">
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary p-3">
                                            <span class="peity-bar"><i class="bi bi-person-fill text-white"></i></span>
                                        </div>
                                        <div>
                                            <label>Tim Divisi Mikrotik</label>
                                            <h4><?= count($dataTimLomba) ?></h4>
                                        </div>
                                    </div><!-- col -->
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary p-3">
                                            <span class="peity-bar"><i class="bi bi-clipboard2-check-fill text-white"></i></span>
                                        </div>
                                        <div>
                                            <label>Submit Tugas</label>
                                            <h4><?= count($dataSubmitTugasTim) ?></h4>
                                        </div>
                                    </div><!-- col -->
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary p-3">
                                            <span class="peity-bar"><i class="bi bi-emoji-smile-fill text-white"></i></span>
                                        </div>
                                        <div>
                                            <label>Tim Lolos</label>
                                            <h4><?= count($dataTimLolos) ?></h4>
                                        </div>
                                    </div><!-- col -->
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary p-3">
                                            <span class="peity-bar"><i class="bi bi-emoji-tear-fill text-white"></i></span>
                                        </div>
                                        <div>
                                            <label>Tim Belum Lolos</label>
                                            <h4><?= count($dataTimNotLolos) ?></h4>
                                        </div>
                                    </div><!-- col -->
                                </div><!-- card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>


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
                                    <!-- Row for two-column layout -->
                                    <div class="row">
                                        <!-- Nama Tim -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_tim">Nama Tim</label>
                                                <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="<?= $data->tim ?? '' ?>" disabled>
                                            </div>
                                        </div>

                                        <!-- Divisi Lomba -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="divisi_lomba">Divisi Lomba</label>
                                                <input type="text" class="form-control" id="divisi_lomba" name="divisi_lomba" value="<?= $data->lomba ?? '' ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row for Pembimbing and Sekolah -->
                                    <div class="row">
                                        <!-- Pembimbing -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pembimbing">Pembimbing</label>
                                                <input type="text" class="form-control" id="pembimbing" name="pembimbing" value="<?= $data->pembimbing ?? '' ?>" disabled>
                                            </div>
                                        </div>

                                        <!-- Sekolah -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sekolah">Sekolah</label>
                                                <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $data->sekolah ?? '' ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status Penilaian -->
                                    <div class="form-group">
                                        <label for="status_penilaian">Status Penilaian</label>
                                        <select class="form-control" id="status_penilaian" name="status_penilaian" required>
                                            <option value="" selected><?= $data->status_penilaian ?></option>
                                            <option value="Belum Dinilai" <?= ($data->status_penilaian == 'Belum Dinilai') ? 'selected' : '' ?>>Belum Dinilai</option>
                                            <option value="Sudah Dinilai" <?= ($data->status_penilaian == 'Sudah Dinilai') ? 'selected' : '' ?>>Sudah Dinilai</option>
                                        </select>
                                    </div>

                                    <!-- Field Skor -->
                                    <div class="form-group">
                                        <label for="skor_nilai">Skor</label>
                                        <input type="number" class="form-control" id="skor_nilai" name="skor_nilai" value="<?= $data->skor ?? '' ?>" required min="0" max="100">
                                    </div>

                                    <!-- Field Feedback -->
                                    <div class="form-group">
                                        <label for="feedback">Feedback</label>
                                        <textarea class="form-control" id="feedback" name="feedback" rows="4" required><?= $data->feedback ?? '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Save changes</button>
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
            <h2 class="az-content-title">Daftar Submit Tugas</h2>

            <div class="d-flex flex-row justify-content-between">
                <div class="container flex-column">
                    <div class="az-content-label mg-b-5">Informasi Submit Tugas</div>
                    <p class="mg-b-20">Daftar tim yang telah mengirimkan tugas mereka, namun belum dinilai oleh juri.</p>
                </div>
                <div class="container justify-content-end">
                    <div class="media-body">
                        <label>Date</label>
                        <h6><?= $tanggalLengkap ?></h6>
                    </div><!-- media-body -->
                    <div class="media-body">
                        <label>Time</label>
                        <h6><?= $jamSekarang ?></h6>
                    </div><!-- media-body -->
                </div>
            </div>

            <div class="container">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Lihat Data
                </button>
            </div>

            <br>

            <div class="table-responsive">
                <table id="example" class="table table-striped">
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
                                <td><a href="<?= esc($data->link_tugas) ?>" target="_blank"><i class="text-decoration-underline">link tugas</i></a></td>
                                <td><?= esc($data->status_pengumpulan) ?></td>
                                <td><?= esc($data->status_penilaian) ?></td>
                                <td><?= esc($data->tgl) ?></td>
                                <td><?= esc($data->jam) ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg-update<?= $data->id_submit_pengumpulan ?>">
                                        Nilai
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="container d-flex justify-content-start">
                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                    <!-- card-dashboard-five -->
                </div><!-- col -->
            </div>

            <hr class="mg-y-30">

            <div class="ht-40"></div>