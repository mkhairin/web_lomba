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
                                              name="link_soal" placeholder="Masukkan link soal">
                                      </div>
                                  </div>
                              </div>
                              <!-- /.row -->
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
      <?php endforeach; ?>



      <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
              <span>Components</span>
              <span>Tables</span>
              <span>Basic Tables</span>
          </div>
          <h2 class="az-content-title">Basic Tables</h2>

          <div class="az-content-label mg-b-5">Striped Rows</div>
          <p class="mg-b-20">Data tim yang lolos ke tahap berikutnya.</p>

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
                                  <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                      data-target="#modal-lg-update<?= $soal->id_soal ?>"><i
                                          class="bi bi-pencil-square"></i></button>
                                  <a class="btn btn-dark btn-sm" href="/daftar-soal/delete/<?= $soal->id_soal ?>" role="button"><i class="bi bi-trash3-fill"></i></a>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                  </tbody>
              </table>
          </div>

          <hr class="mg-y-30">

          <div class="ht-40"></div>