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
 <?php foreach ($dataQuestions as $data) : ?>
     <form action="/daftar-pertanyaan/update/<?= $data->id_faq ?>" method="post">
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
 <?php endforeach; ?>

 <!-- Modal Delete -->
 <?php foreach ($dataQuestions as $data) : ?>
     <form action="/daftar-pertanyaan/delete/<?= $data->id_faq ?>">
         <?php csrf_field() ?>
         <div class="modal fade" id="modal-delete<?= $data->id_faq ?>">
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

     <!-- Include SweetAlert2 -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             <?php if (session()->getFlashdata('success')): ?>
                 Swal.fire({
                     title: 'Success!',
                     text: '<?= session()->getFlashdata('success'); ?>',
                     icon: 'success',
                     confirmButtonText: 'OK',
                     confirmButtonColor: '#0d6efd' // Warna biru
                 });
             <?php elseif (session()->getFlashdata('error')): ?>
                 Swal.fire({
                     title: 'Error!',
                     text: '<?= session()->getFlashdata('error'); ?>',
                     icon: 'error',
                     confirmButtonText: 'OK',
                     confirmButtonColor: '#0d6efd' // Warna biru
                 });
             <?php endif; ?>
         });
     </script>

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

     <div class="az-content-label mg-b-5">Informasi Pertanyaan Umum</div>
     <p class="mg-b-20">Daftar pertanyaan yang sering diajukan beserta jawabannya terkait kompetisi.</p>


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
                             <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                 data-target="#modal-delete<?= $data->id_faq ?>">Delete</button>
                         </td>
                     </tr>
                 <?php endforeach; ?>
                 <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
             </tbody>
         </table>
     </div>

     <hr class="mg-y-30">

     <div class="ht-40"></div>