      <!-- Modal Add -->
      <form action="/daftar-soal/insert" method="post">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-lg">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Tambah Daftar Soal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="card-body">
                              <div class="row">
                                  <input type="hidden" name="id_soal" id="id_soal">
                                  <!-- Kategori Lomba -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="id_lomba">Kategori</label>
                                          <select class="form-control select" id="id_lomba" name="id_lomba"
                                              style="width: 100%;">
                                              <option value="Aktif" selected>Pilih Kategori</option>
                                              <?php foreach ($dataLomba as $lomba) : ?>
                                                  <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>
                                  <!-- Link Peraturan -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="link_soal">Link Soal</label>
                                          <input type="text" class="form-control" id="link_soal"
                                              name="link_soal" placeholder="Masukkan Link Soal">
                                      </div>
                                  </div>
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

      <?php foreach ($dataSoal as $soal) : ?>
          <!-- Modal Update -->
          <form action="/daftar-soal/update/<?= $soal->id_soal ?>" method="post">
              <?php csrf_field() ?>
              <div class="modal fade" id="modal-lg-update<?= $soal->id_soal ?>">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Update Daftar Soal</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="card-body">
                                  <div class="row">
                                      <input type="hidden" name="id_soal" id="id_soal">
                                      <!-- Kategori Lomba -->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="id_lomba">Kategori</label>
                                              <select class="form-control select" id="id_lomba" name="id_lomba"
                                                  style="width: 100%;">
                                                  <option value="Aktif" selected>Pilih Kategori</option>
                                                  <?php foreach ($dataLomba as $lomba) : ?>
                                                      <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                      <!-- Link Peraturan -->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="link_soal">Link Soal</label>
                                              <input type="text" class="form-control" id="link_soal"
                                                  name="link_soal" value="<?= $soal->link_soal ?>">
                                          </div>
                                      </div>
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
      <?php endforeach; ?>

      <!-- Modal Delete -->
      <?php foreach ($dataSoal as $data) : ?>
          <form action="/daftar-soal/delete/<?= $data->id_soal ?>">
              <?php csrf_field() ?>
              <div class="modal fade" id="modal-delete<?= $data->id_soal ?>">
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

          <h2 class="az-content-title">Daftar Soal Lomba</h2>

          <div class="az-content-label mg-b-5">Informasi Soal</div>
          <p class="mg-b-20">Data soal yang tersedia untuk kompetisi, termasuk kategori, tingkat kesulitan, dan jumlah poin yang dapat diperoleh.</p>


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
                          <th>Kategori</th>
                          <th>Link Soal</th>
                          <th style="width: 200px">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Tambahkan data statik -->
                      <?php $i = 1; ?>
                      <?php foreach ($dataSoal as $soal) : ?>
                          <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $soal->nama ?></td>
                              <td><a href="<?= $soal->link_soal ?>">Link Soal <?= $soal->nama ?></a></td>
                              <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                      data-target="#modal-lg-update<?= $soal->id_soal ?>">Update</button>
                                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                      data-target="#modal-delete<?= $data->id_soal ?>">Delete</button>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                  </tbody>
              </table>
          </div>

          <hr class="mg-y-30">

          <div class="ht-40"></div>