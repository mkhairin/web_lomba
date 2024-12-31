<!-- Modal Update -->
<?php foreach ($dataEmail as $data) : ?>
    <form action="/email/list/update/<?= $data->id_emails ?>" method="post">
        <?= csrf_field() ?>
        <div class="modal fade" id="modal-lg-update<?= $data->id_emails ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Pertanyaan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $data->name ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $data->email ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" name="subject" id="subject" value="<?= $data->subject ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required><?= $data->message ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status" disabled>
                                        <option value="sent" <?= $data->status === 'sent' ? 'selected' : '' ?>>Sent</option>
                                        <option value="draft" <?= $data->status === 'draft' ? 'selected' : '' ?>>Draft</option>
                                        <option value="pending" <?= $data->status === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="tgl" id="tgl" value="<?= $data->tgl ?>">
                                <input type="hidden" class="form-control" name="jam" id="jam" value="<?= $data->jam ?>">
                                <input type="hidden" class="form-control" name="read_status" id="read_status" value="read">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Mark as read <i class="fa-regular fa-circle-check"></i></button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($dataEmail as $data) : ?>
    <form action="/email/list/delete/<?= $data->id_emails ?>">
        <?php csrf_field() ?>
        <div class="modal fade" id="modal-delete<?= $data->id_emails ?>">
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
                            <p>Apakah Kamu benar ingin menghapus email ini?</p>
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

    <h2 class="az-content-title">Daftar Email Masuk</h2>

    <div class="az-content-label mg-b-5">Informasi Email</div>
    <p class="mg-b-20">Daftar email yang masuk ke sistem, termasuk pengirim, subjek, dan tanggal penerimaan.</p>


    <br>

    <div class="table-responsive">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Status</th>
                    <th>Tgl</th>
                    <th>Jam</th>
                    <th>Read Status</th>
                    <th style="width: 200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataEmail as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data->name ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->subject ?></td>
                        <td><?= $data->status ?></td>
                        <td><?= $data->tgl ?></td>
                        <td><?= $data->jam ?></td>
                        <td><?= $data->read_status ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-lg-update<?= $data->id_emails ?>">View</button>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                data-target="#modal-delete<?= $data->id_emails ?>"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>