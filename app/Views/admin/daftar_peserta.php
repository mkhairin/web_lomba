   <!-- Modal Add -->
   <form action="/daftar-peserta/insert" method="post">
       <?php csrf_field() ?>
       <div class="modal fade" id="modal-lg">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">Tambah Daftar Peserta</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="card-body">
                           <div class="row">
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <input type="hidden" name="id" id="id">
                                       <label for="id_lomba">Kategori Lomba</label>
                                       <select class="form-control select" id="id_lomba" name="id_lomba"
                                           style="width: 100%;">
                                           <option value="" selected>Pilih Kategori</option>
                                           <?php foreach ($dataLomba as $lomba) : ?>
                                               <option value="<?= $lomba->id_lomba; ?>"><?= $lomba->nama; ?></option>
                                           <?php endforeach; ?>
                                       </select>
                                   </div>
                               </div>
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="id_pembimbing">Pembimbing</label>
                                       <select class="form-control select" id="id_pembimbing" name="id_pembimbing"
                                           style="width: 100%;">
                                           <option value="" selected>Pilih Pembimbing</option>
                                           <?php foreach ($dataPembimbing as $data) : ?>
                                               <option value="<?= $data->id_pembimbing; ?>">
                                                   <?= $data->nama_pembimbing; ?></option>
                                           <?php endforeach; ?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="id_sekolah">Sekolah</label>
                                       <select class="form-control select" id="id_sekolah" name="id_sekolah"
                                           style="width: 100%;">
                                           <option value="" selected>Pilih Sekolah</option>
                                           <?php foreach ($dataSekolah as $data) : ?>
                                               <option value="<?= $data->id_sekolah; ?>"><?= $data->nama_sekolah; ?>
                                               </option>
                                           <?php endforeach; ?>
                                       </select>
                                   </div>
                               </div>
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="id_tim_lomba">Tim Lomba</label>
                                       <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba"
                                           style="width: 100%;">
                                           <option value="" selected>Pilih Tim</option>
                                           <?php foreach ($dataTimLomba as $data) : ?>
                                               <option value="<?= $data->id_tim_lomba; ?>"><?= $data->nama_tim; ?>
                                               </option>
                                           <?php endforeach; ?>
                                       </select>
                                   </div>
                               </div>
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="nama_peserta">Nama Peserta</label>
                                       <input type="text" class="form-control" id="nama_peserta"
                                           name="nama_peserta" placeholder="Masukkan Nama Peserta" required>
                                   </div>
                               </div>
                               <!-- /.col -->
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="no_handphone">No Handphone</label>
                                       <input type="text" class="form-control" id="no_handphone"
                                           name="no_handphone" placeholder="Masukkan No Peserta" required>
                                   </div>
                               </div>
                               <!-- /.col -->
                           </div>
                           <!-- /.row -->
                       </div>
                       <!-- /.card-body -->
                   </div>
                   <div class="modal-footer justify-content-between">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
   <?php foreach ($dataPeserta as $data) : ?>
       <form action="/daftar-peserta/update/<?= $data->id_peserta ?>" method="post">
           <?php csrf_field() ?>
           <div class="modal fade" id="modal-lg-update<?= $data->id_peserta ?>">
               <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title">Update Daftar Peserta</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <div class="card-body">
                               <div class="row">
                                   <!-- Kategori Lomba -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <input type="hidden" name="id" id="id" value="<?= $data->id_peserta; ?>">
                                           <label for="id_lomba">Kategori Lomba</label>
                                           <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;" required>
                                               <option value="" disabled>Pilih Kategori</option>
                                               <?php foreach ($dataLomba as $lomba) : ?>
                                                   <option value="<?= $lomba->id_lomba; ?>" <?= ($lomba->id_lomba == $data->id_lomba) ? 'selected' : ''; ?>>
                                                       <?= $lomba->nama; ?>
                                                   </option>
                                               <?php endforeach; ?>
                                           </select>
                                       </div>
                                   </div>

                                   <!-- Pembimbing -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="id_pembimbing">Pembimbing</label>
                                           <select class="form-control select" id="id_pembimbing" name="id_pembimbing" style="width: 100%;" required>
                                               <option value="" disabled>Pilih Pembimbing</option>
                                               <?php foreach ($dataPembimbing as $pembimbing) : ?>
                                                   <option value="<?= $pembimbing->id_pembimbing; ?>" <?= ($pembimbing->id_pembimbing == $data->id_pembimbing) ? 'selected' : ''; ?>>
                                                       <?= $pembimbing->nama_pembimbing; ?>
                                                   </option>
                                               <?php endforeach; ?>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <!-- Sekolah -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="id_sekolah">Sekolah</label>
                                           <select class="form-control select" id="id_sekolah" name="id_sekolah" style="width: 100%;" required>
                                               <option value="" disabled>Pilih Sekolah</option>
                                               <?php foreach ($dataSekolah as $sekolah) : ?>
                                                   <option value="<?= $sekolah->id_sekolah; ?>" <?= ($sekolah->id_sekolah == $data->id_sekolah) ? 'selected' : ''; ?>>
                                                       <?= $sekolah->nama_sekolah; ?>
                                                   </option>
                                               <?php endforeach; ?>
                                           </select>
                                       </div>
                                   </div>

                                   <!-- Tim Lomba -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="id_tim_lomba">Tim Lomba</label>
                                           <select class="form-control select" id="id_tim_lomba" name="id_tim_lomba" style="width: 100%;" required>
                                               <option value="" disabled>Pilih Tim</option>
                                               <?php foreach ($dataTimLomba as $dataTim) : ?>
                                                   <option value="<?= $dataTim->id_tim_lomba; ?>" <?= ($dataTim->id_tim_lomba == $data->id_tim_lomba) ? 'selected' : ''; ?>>
                                                       <?= $dataTim->nama_tim; ?>
                                                   </option>
                                               <?php endforeach; ?>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <!-- Nama Peserta -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="nama_peserta">Nama Peserta</label>
                                           <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" placeholder="Masukkan Nama Peserta" value="<?= $data->nama_peserta; ?>" required>
                                       </div>
                                   </div>

                                   <!-- No Handphone -->
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="no_handphone">No Handphone</label>
                                           <input type="text" class="form-control" id="no_handphone" name="no_handphone" placeholder="Masukkan No Peserta" value="<?= $data->no_handphone; ?>" required>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   <?php endforeach; ?>


   <!-- Modal Delete -->
   <?php foreach ($dataPeserta as $data) : ?>
       <form action="/daftar-peserta/delete/<?= $data->id_peserta ?>">
           <?php csrf_field() ?>
           <div class="modal fade" id="modal-delete<?= $data->id_peserta ?>">
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
                               <p>Apakah Kamu benar ingin menghapus data ini?</p>
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

       <?php $validation = \Config\Services::validation(); ?>

       <!-- Pesan sukses -->
       <?php if (session()->getFlashdata('success')): ?>
           <div class="alert alert-success">
               <?= session()->getFlashdata('success'); ?>
           </div>
       <?php endif; ?>

       <!-- Pesan error general -->
       <?php if (session()->getFlashdata('error')): ?>
           <div class="alert alert-danger">
               <?= session()->getFlashdata('error'); ?>
           </div>
       <?php endif; ?>

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
       <h2 class="az-content-title">Basic Tables</h2>

       <div class="az-content-label mg-b-5">Striped Rows</div>
       <p class="mg-b-20">Data tim yang lolos ke tahap berikutnya.</p>

       <div class="container">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
               Tambah Data
           </button>
       </div>

       <br>

       <div class="table-responsive">
           <table id="example" class="table table-striped">
               <thead>
                   <tr>
                       <th style="width: 10px">#</th>
                       <th>Nama Peserta</th>
                       <th>Pembimbing</th>
                       <th>Sekolah</th>
                       <th>Lomba</th>
                       <th>Tim</th>
                       <th>No Handphone</th>
                       <th style="width: 200px">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1 ?>
                   <?php foreach ($dataPeserta as $data) : ?>
                       <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $data->nama_peserta ?></td>
                           <td><?= $data->nama_pembimbing ?></td>
                           <td><?= $data->nama_sekolah ?></td>
                           <td><?= $data->nama ?></td>
                           <td><?= $data->nama_tim ?></td>
                           <td><?= $data->no_handphone ?></td>
                           <td>

                               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                   data-target="#modal-lg-update<?= $data->id_peserta ?>">Update</button>
                               <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                   data-target="#modal-delete<?= $data->id_peserta ?>">Delete</button>
                           </td>
                       </tr>
                   <?php endforeach; ?>
                   <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
               </tbody>
           </table>
       </div>

       <hr class="mg-y-30">

       <div class="ht-40"></div>