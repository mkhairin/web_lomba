  <!-- Modal Add -->
  <form action="/juri/insert" method="post">
      <?php csrf_field() ?>
      <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Daftar Juri</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="username">Username</label>
                                      <input type="text" class="form-control" name="username" id="username"
                                          placeholder="Masukkan Username" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="text" class="form-control" name="password" id="password"
                                          placeholder="Masukkan Password" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="role">Role</label>
                                      <select class="form-control select" id="role" name="role"
                                          style="width: 100%;">
                                          <option value="" disabled selected>Pilih Role</option>
                                          <option value="juri">
                                              Juri</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="id_lomba">Kategori</label>
                                      <select class="form-control select" id="id_lomba" name="id_lomba"
                                          style="width: 100%;">
                                          <option value="" disabled selected>Pilih Kategori</option>
                                          <?php foreach ($dataLomba as $lomba) : ?>
                                              <option value="<?= $lomba->id_lomba ?>"><?= $lomba->nama ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
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

  <?php foreach ($dataJuri as $juri) : ?>
      <!-- Modal Update -->
      <form action="/juri/update/<?= $juri->id_juri ?>" method="post">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-lg-update<?= $juri->id_juri ?>">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Edit Juri</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="text" class="form-control" name="username" id="username"
                                              value="<?= $juri->username ?>" placeholder="Masukkan Username" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="text" class="form-control" name="password" id="password"
                                              value="<?= $juri->password ?>" placeholder="Masukkan Password" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="role">Role</label>
                                          <select class="form-control select" id="role" name="role" style="width: 100%;">
                                              <option value="" disabled>Pilih Role</option>
                                              <option value="juri" <?= $juri->role === 'juri' ? 'selected' : '' ?>>
                                                  Juri</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="id_lomba">Kategori</label>
                                          <select class="form-control select" id="id_lomba" name="id_lomba" style="width: 100%;">
                                              <option value="" disabled>Pilih Kategori</option>
                                              <?php foreach ($dataLomba as $lomba) : ?>
                                                  <option value="<?= $lomba->id_lomba ?>"
                                                      <?= $juri->id_lomba == $lomba->id_lomba ? 'selected' : '' ?>>
                                                      <?= $lomba->nama ?>
                                                  </option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
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
  <?php foreach ($dataJuri as $juri) : ?>
      <form action="/juri/delete/<?= $juri->id_juri ?>">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-delete<?= $juri->id_juri ?>">
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

      <h2 class="az-content-title">Daftar Akun Juri</h2>

      <div class="az-content-label mg-b-5">Informasi Akun Juri</div>
      <p class="mg-b-20">Daftar akun juri yang terdaftar dalam sistem, termasuk nama, peran, dan status akun juri.</p>



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
                      <th>Username</th>
                      <th>Password</th>
                      <th>Roles</th>
                      <th>Lomba</th>
                      <th style="width: 200px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($dataJuri as $data) : ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $data->username ?></td>
                          <td style="text-align: justify;">
                              <?= substr($data->password, 0, 10) . '...' ?>
                          </td>
                          <td><?= $data->role ?></td>
                          <td><?= $data->nama ?></td>
                          <td>
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                  data-target="#modal-lg-update<?= $data->id_juri ?>">Update</button>
                              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                  data-target="#modal-delete<?= $data->id_juri ?>">Delete</button>
                          </td>
                      </tr>
                  <?php endforeach ?>
              </tbody>
          </table>
      </div>

      <hr class="mg-y-30">

      <div class="ht-40"></div>