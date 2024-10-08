<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard User</h1>
                </div>
                <div class="col-sm-6 d-flex mt-3">
                    <h6 class="mx-2">Jam</h6>
                    <small><?= $jam ?></small>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Custom Tabs -->
        <div class="card shadow-none">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3"></h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link " href="#tab_1" data-toggle="tab">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Peserta</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Sekolah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Pembimbing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Tim Lolos</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane text-dark active" id="tab_1">
                        <h6>Daftar Tim</h6>
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tim</th>
                                    <th>Kategori</th>
                                    <th>Sekolah</th>
                                    <th>Pembimbing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($dataTimLomba as $timLomba) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $timLomba->nama_tim ?></td>
                                        <td style="text-align: justify;">
                                            <?= $timLomba->nama ?>
                                        </td>
                                        <td><?= $timLomba->nama_sekolah ?></td>
                                        <td><?= $timLomba->nama_tim ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <h6>Daftar Peserta</h6>
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Kategori</th>
                                    <th>Pembimbing</th>
                                    <th>Sekolah</th>
                                    <th>Nama Peserta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($dataPeserta as $peserta) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $peserta->nama ?></td>
                                        <td style="text-align: justify;">
                                            <?= $peserta->nama_pembimbing ?>
                                        </td>
                                        <td><?= $peserta->nama_sekolah ?></td>
                                        <td><?= $peserta->nama_peserta ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <h6>Daftar Sekolah</h6>
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Sekolah</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($dataSekolah as $sekolah) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $sekolah->nama_sekolah ?></td>
                                        <td style="text-align: justify;">
                                            <?= $sekolah->alamat ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                        <h6>Daftar Pembimbing</h6>
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Sekolah</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $pembimbing->nama_sekolah ?></td>
                                        <td style="text-align: justify;">
                                            <?= $pembimbing->nama ?>
                                        </td>
                                        <td><?= $pembimbing->nama_pembimbing ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                        <div class="card card-dark card-outline card-outline-tabs shadow-none">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Mikrotik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">IT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Desain Grafis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Cisco</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <table id="example1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Kategori</th>
                                                    <th>Sekolah</th>
                                                    <th>Pembimbing</th>
                                                    <th>Nilai</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($Mikrotik as $dataMikrotik) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $dataMikrotik->nama ?></td>
                                                        <td style="text-align: justify;">
                                                            <?= $dataMikrotik->nama_sekolah ?>
                                                        </td>
                                                        <td><?= $dataMikrotik->nama_pembimbing ?></td>
                                                        <td><?= $dataMikrotik->nilai ?></td>
                                                        <td><?= $dataMikrotik->status ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <table id="example1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Kategori</th>
                                                    <th>Sekolah</th>
                                                    <th>Pembimbing</th>
                                                    <th>Nilai</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($IT as $dataIT) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $dataIT->nama ?></td>
                                                        <td style="text-align: justify;">
                                                            <?= $dataIT->nama_sekolah ?>
                                                        </td>
                                                        <td><?= $dataIT->nama_pembimbing ?></td>
                                                        <td><?= $dataIT->nilai ?></td>
                                                        <td><?= $dataIT->status ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                        <table id="example1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Kategori</th>
                                                    <th>Sekolah</th>
                                                    <th>Pembimbing</th>
                                                    <th>Nilai</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($desainGrafis as $dataGrafis) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $dataGrafis->nama ?></td>
                                                        <td style="text-align: justify;">
                                                            <?= $dataGrafis->nama_sekolah ?>
                                                        </td>
                                                        <td><?= $dataGrafis->nama_pembimbing ?></td>
                                                        <td><?= $dataGrafis->nilai ?></td>
                                                        <td><?= $dataGrafis->status ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                        <table id="example1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Kategori</th>
                                                    <th>Sekolah</th>
                                                    <th>Pembimbing</th>
                                                    <th>Nilai</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($cisco as $dataCisco) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $dataCisco->nama ?></td>
                                                        <td style="text-align: justify;">
                                                            <?= $dataCisco->nama_sekolah ?>
                                                        </td>
                                                        <td><?= $dataCisco->nama_pembimbing ?></td>
                                                        <td><?= $dataCisco->nilai ?></td>
                                                        <td><?= $dataCisco->status ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->