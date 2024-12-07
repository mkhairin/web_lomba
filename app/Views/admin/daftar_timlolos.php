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

    <h2 class="az-content-title">Daftar Tim Lolos</h2>

    <div class="az-content-label mg-b-5">Informasi Tim Lolos</div>
    <p class="mg-b-20">Data tim yang berhasil lolos ke tahap berikutnya dalam kompetisi, termasuk nama tim dan asal sekolah.</p>


    <div class="table-responsive">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tim</th>
                    <th>Ketua</th>
                    <th>Kategori</th>
                    <th>Pembimbing</th>
                    <th>Sekolah</th>
                    <th>Skor Nilai</th>
                    <th>Status</th>
                    <th style="width: 200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataTimLolos as $timLolos) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $timLolos->tim ?></td>
                        <td style="text-align: justify;">
                            <?= $timLolos->ketua ?>
                        </td>
                        <td><?= $timLolos->lomba ?></td>
                        <td><?= $timLolos->pembimbing ?></td>
                        <td><?= $timLolos->sekolah ?></td>
                        <td><?= $timLolos->skor_nilai ?></td>
                        <td><?= $timLolos->status ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-lg-update<?= $timLolos->id_tim_lolos ?>">Update</button>
                            <a class="btn btn-outline-primary btn-sm"
                                href="/daftar-lolos/delete/<?= $timLolos->id_tim_lolos ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>