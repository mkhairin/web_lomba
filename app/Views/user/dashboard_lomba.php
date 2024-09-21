<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Custom Tabs -->
        <div class="card shadow-none">
            <div class="card-body">
                <?php foreach ($dataSoal as $data) : ?>
                    <h1><?= $data->link_soal ?></h1>
                <?php endforeach; ?>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->