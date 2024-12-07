  <!-- Modal Add -->
  <form action="/daftar-lomba/insert" method="post">
      <?php csrf_field() ?>
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
                              <!-- Kategori Lomba -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="nama">Kategori</label>
                                      <input type="text" class="form-control" id="nama" name="nama"
                                          placeholder="Masukkan kategori" required>
                                  </div>
                              </div>
                              <!-- Deskripsi Lomba -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="deskripsi">Deskripsi</label>
                                      <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                          placeholder="Masukkan deskripsi" required>
                                  </div>
                              </div>
                              <!-- Link Peraturan -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="link_peraturan">Link Aturan</label>
                                      <input type="text" class="form-control" id="link_peraturan"
                                          name="link_peraturan" placeholder="Masukkan link aturan" required>
                                  </div>
                              </div>
                              <!-- Link Pendaftaran -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="link_pendaftaran">Link Pendaftaran</label>
                                      <input type="text" class="form-control" id="link_pendaftaran"
                                          name="link_pendaftaran" placeholder="Masukkan link pendaftaran" required>
                                  </div>
                              </div>
                              <!-- Tanggal Dibuka -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="tgl_dibuka">Tgl Dibuka</label>
                                      <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka" required>
                                  </div>
                              </div>
                              <!-- Tanggal Ditutup -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="tgl_ditutup">Tgl Ditutup</label>
                                      <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup" required>
                                  </div>
                              </div>
                              <!-- Status Lomba -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="status">Status</label>
                                      <select class="form-control select" id="status" name="status"
                                          style="width: 100%;">
                                          <option value="Aktif" selected>Aktif</option>
                                          <option value="Non-Aktif">Non-Aktif</option>
                                          <option value="Pending">Pending</option>
                                      </select>
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

  <!-- Modal Update -->
  <?php foreach ($dataLomba as $data) : ?>
      <form action="/daftar-lomba/update/<?= $data->id_lomba ?>" method="post">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-lg-update<?= $data->id_lomba ?>">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Update Daftar Lomba</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="card-body">
                              <div class="row">
                                  <!-- Hidden Input for ID -->
                                  <input type="hidden" name="id" id="id" value="<?= $data->id_lomba ?>">

                                  <!-- Kategori Lomba -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="nama">Kategori</label>
                                          <input type="text" class="form-control" id="nama" name="nama"
                                              value="<?= $data->nama ?>" placeholder="Masukkan Kategori Lomba" required>
                                      </div>
                                  </div>
                                  <!-- Deskripsi Lomba -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="deskripsi">Deskripsi</label>
                                          <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                              value="<?= $data->deskripsi ?>" placeholder="Masukkan Deskripsi Lomba" required>
                                      </div>
                                  </div>
                                  <!-- Link Peraturan -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="link_peraturan">Link Peraturan</label>
                                          <input type="text" class="form-control" id="link_peraturan"
                                              name="link_peraturan" value="<?= $data->link_peraturan ?>"
                                              placeholder="Masukkan link aturan" required>
                                      </div>
                                  </div>
                                  <!-- Link Pendaftaran -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="link_pendaftaran">Link Pendaftaran</label>
                                          <input type="text" class="form-control" id="link_pendaftaran"
                                              name="link_pendaftaran" value="<?= $data->link_pendaftaran ?>"
                                              placeholder="Masukkan link pendaftaran" required>
                                      </div>
                                  </div>
                                  <!-- Tanggal Dibuka -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="tgl_dibuka">Tgl Dibuka</label>
                                          <input type="date" class="form-control" id="tgl_dibuka" name="tgl_dibuka"
                                              value="<?= $data->tgl_dibuka ?>" required>
                                      </div>
                                  </div>
                                  <!-- Tanggal Ditutup -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="tgl_ditutup">Tgl Ditutup</label>
                                          <input type="date" class="form-control" id="tgl_ditutup" name="tgl_ditutup"
                                              value="<?= $data->tgl_ditutup ?>" required>
                                      </div>
                                  </div>
                                  <!-- Status Lomba -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="status">Status</label>
                                          <select class="form-control select" id="status" name="status"
                                              style="width: 100%;">
                                              <option value="<?= $data->status ?>" selected><?= $data->status ?>
                                              </option>
                                              <option value="Non-Aktif">Non-Aktif</option>
                                              <option value="Pending">Pending</option>
                                          </select>
                                      </div>
                                  </div>
                                  <!-- Peraturan Lomba -->
                                  <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="peraturan">Aturan</label>
                                                <textarea class="form-control" rows="4" id="peraturan" name="peraturan"
                                                    placeholder="Masukkan Peraturan" required></textarea>
                                            </div>
                                        </div> -->
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
  <?php foreach ($dataLomba as $data) : ?>
      <form action="/daftar-sponsor/delete/<?= $data->id_lomba ?>">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-delete<?= $data->id_lomba ?>">
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
      <h2 class="az-content-title">Daftar Kategori Lomba</h2>
      <div class="az-content-label mg-b-5">Tabel Kategori Lomba</div>
      <p class="mg-b-20">Data kategori lomba Kaltech.</p>

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
                      <th>Deskripsi</th>
                      <th>Link Aturan</th>
                      <th>Link Pendaftaran</th>
                      <th>Tgl Buka</th>
                      <th>Tgl Tutup</th>
                      <th>Status</th>
                      <th style="width: 100px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($dataLomba as $data) : ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $data->nama ?></td>
                          <td style="text-align: justify;">
                              <?= $data->deskripsi ?>
                          </td>
                          <td><a href="<?= $data->link_peraturan ?>">Peraturan <?= $data->nama ?></a></td>
                          <td><a href="<?= $data->link_pendaftaran ?>">Pendaftaran <?= $data->nama ?></a></td>
                          <td><?= $data->tgl_dibuka ?></td>
                          <td><?= $data->tgl_ditutup ?></td>
                          <td><?= $data->status ?></td>
                          <td>

                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                  data-target="#modal-lg-update<?= $data->id_lomba ?>">Update</button>
                              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                  data-target="#modal-delete<?= $data->id_lomba ?>">Delete</button>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
              </tbody>
          </table>
      </div>

      <hr class="mg-y-30">

      <div class="ht-40"></div>