<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Lomba</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Modal Add -->
        <form>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" class="form-control" id="kategori"
                                                placeholder="Masukkan kategori">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi"
                                                placeholder="Masukkan deskripsi">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="url" class="form-control" id="link"
                                                placeholder="Masukkan link">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" id="status" style="width: 100%;">
                                                <option selected="selected">Aktif</option>
                                                <option>Non-Aktif</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="aturan">Aturan</label>
                                            <textarea class="form-control" id="aturan" rows="4"
                                                placeholder="Masukkan aturan"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>



        <!-- Modal Update -->
        <form>
            <div class="modal fade" id="modal-update">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" class="form-control" id="kategori"
                                                placeholder="Masukkan kategori">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi"
                                                placeholder="Masukkan deskripsi">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="url" class="form-control" id="link"
                                                placeholder="Masukkan link">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" id="status" style="width: 100%;">
                                                <option selected="selected">Aktif</option>
                                                <option>Non-Aktif</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="aturan">Aturan</label>
                                            <textarea class="form-control" id="aturan" rows="4"
                                                placeholder="Masukkan aturan"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>


        <!-- Modal Delete -->
        <form>
            <div class="modal fade" id="modal-delete">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Daftar Lomba</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" class="form-control" id="kategori"
                                                placeholder="Masukkan kategori">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi"
                                                placeholder="Masukkan deskripsi">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="url" class="form-control" id="link"
                                                placeholder="Masukkan link">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" id="status" style="width: 100%;">
                                                <option selected="selected">Aktif</option>
                                                <option>Non-Aktif</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="aturan">Aturan</label>
                                            <textarea class="form-control" id="aturan" rows="4"
                                                placeholder="Masukkan aturan"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>



        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>

        <br> <br>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Lomba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aturan</th>
                            <th>Link</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Pemogramanan</td>
                            <td style="text-align: justify;">
                                Selamat datang di Lomba Pemrograman Poltek, ajang kompetisi bergengsi untuk para
                                programmer dan developer dari seluruh Indonesia! Di sini, kreativitas, logika, dan
                                keterampilan teknis Anda akan diuji melalui serangkaian tantangan pemrograman yang
                                dirancang untuk mengasah kemampuan dan membuktikan siapa yang terbaik di bidangnya.
                                Apa yang Bisa Anda Harapkan?
                                Tantangan Beragam: Lomba ini terdiri dari berbagai kategori, termasuk pengembangan
                                aplikasi web, mobile, keamanan siber, dan algoritma. Setiap tantangan dirancang untuk
                                menguji kemampuan pemrograman Anda dalam berbagai aspek.
                                Hadiah Menarik: Menangkan hadiah total puluhan juta rupiah, sertifikat, serta peluang
                                eksklusif untuk bergabung dengan perusahaan teknologi terkemuka.
                                Mentorship dan Workshop: Dapatkan bimbingan langsung dari para ahli industri dan ikuti
                                berbagai workshop yang akan membantu Anda meningkatkan keterampilan pemrograman.
                            </td>
                            <td>02/06/2025</td>
                            <td>02/06/2025</td>
                            <td>02/06/2025</td>
                            <td><span class="badge rounded-pill text-bg-primary bg-primary"
                                    style="opacity: 50%;">Dibuka</span></td>
                            <td>

                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal-update">Update</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-delete">Delete</button>
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