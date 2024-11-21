<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>Components</span>
        <span>Tables</span>
        <span>Basic Tables</span>
    </div>
    <h2 class="az-content-title">Basic Tables</h2>

    <div class="az-content-label mg-b-5">Striped Rows</div>
    <p class="mg-b-20">Data tim yang lolos ke tahap berikutnya.</p>

    <div class="table-responsive">
        <table id="example1" class="table table-striped">
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
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                data-target="#modal-lg-update<?= $timLolos->id_tim_lolos ?>"><i
                                    class="bi bi-pencil-square"></i></button>
                            <a class="btn btn-dark btn-sm"
                                href="/daftar-lolos/delete/<?= $timLolos->id_tim_lolos ?>" role="button"><i
                                    class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <hr class="mg-y-30">

    <div class="ht-40"></div>