<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Tim Lomba</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Tim Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
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
                                <td>
                            </tr>
                        <?php endforeach; ?>
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