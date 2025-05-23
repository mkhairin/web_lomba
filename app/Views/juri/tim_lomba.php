<?php
$uri = service('uri');
$segments = $uri->getSegments();
?>

<div class="az-content-body pd-lg-l-40 d-flex flex-column">

    <?php $validation = \Config\Services::validation(); ?>

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
    <h2 class="az-content-title">Daftar Tim Lomba</h2>

    <div class="az-content-label mg-b-5">Informasi Tim Lomba</div>
    <p class="mg-b-20">Daftar tim yang terdaftar dan mengikuti lomba, termasuk nama tim dan kategori lomba yang diikuti.</p>

    <br>

    <div class="table-responsive">
        <table id="example" class="table table-striped">
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>