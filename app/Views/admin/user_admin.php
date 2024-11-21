  <!-- Modal Add -->
  <form action="/admin/insert" method="post">
      <?php csrf_field() ?>
      <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Daftar User</h4>
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
                                          <option value="admin">
                                              Admin</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

                      </div>
                      <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-dark">Save changes</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </form>

  <!-- Modal Update -->
  <?php foreach ($dataAdmin as $admin) : ?>
      <form action="/admin/update/<?= $admin->id_admin ?>" method="post">
          <?php csrf_field() ?>
          <div class="modal fade" id="modal-lg-update<?= $admin->id_admin ?>">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Daftar Admin</h4>
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
                                              value="<?= $admin->username ?>">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" name="password" placeholder="Masukkan password baru">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="role">Role</label>
                                          <select class="form-control select" id="role" name="role"
                                              style="width: 100%;">
                                              <option value="" disabled selected>Pilih Role</option>
                                              <option value="admin">
                                                  Admin</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <!-- /.card-body -->
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-dark">Save changes</button>
                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </form>
  <?php endforeach ?>


  <div class="az-content-body pd-lg-l-40 d-flex flex-column">
      <div class="az-content-breadcrumb">
          <span>Components</span>
          <span>Tables</span>
          <span>Basic Tables</span>
      </div>
      <h2 class="az-content-title">User Admin</h2>


      <div class="container">
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
              Tambah Data
          </button>
      </div>

      <br>

      <div class="table-responsive">
          <table id="example1" class="table table-striped">
              <thead>
                  <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Roles</th>
                      <th style="width: 200px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($dataAdmin as $admin) : ?>
                      <tr>
                          <td><?= $admin->id_admin ?></td>
                          <td><?= $admin->username ?></td>
                          <td style="text-align: justify;">
                              <?= substr($admin->password, 0, 10) . '...' ?>
                          </td>
                          <td><?= $admin->role ?></td>
                          <td>
                              <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                  data-target="#modal-lg-update<?= $admin->id_admin ?>">Update</button>
                              <a class="btn btn-dark btn-sm" href="/user/delete/"
                                  role="button">Delete</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>

      <hr class="mg-y-30">

      <div class="ht-40"></div>