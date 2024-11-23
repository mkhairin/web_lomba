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
            <h2 class="az-content-title">Daftar Kategori Lomba</h2>

            <div class="az-content-label mg-b-5">Striped Rows</div>
            <p class="mg-b-20">Data tim yang lolos ke tahap berikutnya.</p>

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

            <hr class="mg-y-30">

            <div class="ht-40"></div>