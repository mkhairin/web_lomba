<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper py-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Daftar Link Pengumpulan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <!-- Tombol tambah data -->
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card shadow-none border border-0">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengumpulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kategori</th>
                            <th>Link Pengumpulan</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tambahkan data statik -->
                        <tr>
                            <td>1</td>
                            <td>Programming</td>
                            <td><a href="#">Link Soal Programming</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Fotografi</td>
                            <td><a href="#">Link Soal Fotografi</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Videografi</td>
                            <td><a href="#">Link Soal Videografi</a></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i>
                                    Update</button>
                                <button type="button" class="btn btn-dark btn-sm"><i class="bi bi-trash3-fill"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
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