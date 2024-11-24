 <!-- Modal Add -->
 <form action="/daftar-pertanyaan/insert" method="post">
     <?php csrf_field() ?>
     <div class="modal fade" id="modal-lg">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah Daftar Pertanyaan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="card-body">
                         <div class="form-group">
                             <div class="mb-3">
                                 <label for="questions" class="form-label">Pertanyaan</label>
                                 <input type="text" class="form-control" name="questions" id="questions" placeholder="Masukkan Pertanyaan">
                             </div>
                             <div class="mb-3">
                                 <label for="answers" class="form-label">Jawaban</label>
                                 <textarea type="text" class="form-control" id="answers" name="answers" rows="3"></textarea>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
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
 <?php foreach ($dataQuestions as $data) : ?>
     <form action="/daftar-pertanyaan/update" method="post">
         <?php csrf_field() ?>
         <div class="modal fade" id="modal-lg-update<?= $data->id_faq ?>">
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Update Daftar Pertanyaan</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="card-body">
                             <div class="form-group">
                                 <div class="mb-3">
                                     <label for="questions" class="form-label">Pertanyaan</label>
                                     <input type="text" class="form-control" name="questions" id="questions" value="<?= $data->questions ?>">
                                 </div>
                                 <div class="mb-3">
                                     <label for="answers" class="form-label">Jawaban</label>
                                     <textarea type="text" class="form-control" id="answers" name="answers" rows="3"><?= $data->answers ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
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
     <h2 class="az-content-title">Daftar Pertanyaan/FaQs</h2>

     <div class="az-content-label mg-b-5">Striped Rows</div>
     <p class="mg-b-20">Data tim yang lolos ke tahap berikutnya.</p>

     <div class="container">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
             Tambah Data
         </button>
     </div>

     <br>

     <div class="table-responsive">
         <table id="example1" class="table table-striped">
             <thead>
                 <tr>
                     <th style="width: 10px">#</th>
                     <th>Pertanyaan</th>
                     <th>Jawaban</th>
                     <th style="width: 200px">Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1 ?>
                 <?php foreach ($dataQuestions as $data) : ?>
                     <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $data->questions ?></td>
                         <td><?= $data->answers ?></td>
                         <td>
                             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                 data-target="#modal-lg-update<?= $data->id_faq ?>">Update</button>
                             <a class="btn btn-outline-primary btn-sm" href=""
                                 role="button">Delete</a>
                         </td>
                     </tr>
                 <?php endforeach; ?>
                 <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
             </tbody>
         </table>
     </div>

     <hr class="mg-y-30">

     <div class="ht-40"></div>