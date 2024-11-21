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

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Tim Lolos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->