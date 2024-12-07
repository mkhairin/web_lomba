          <!-- Modal Update for each submission -->
          <?php foreach ($dataTimLolosNew as $data) : ?>
              <form action="/juri-dashboard/tim-lolos/update/<?= $data->id_tim_lolos ?>" method="post">
                  <?= csrf_field() ?>
                  <div class="modal fade" id="modal-lg-update<?= $data->id_tim_lolos ?>" tabindex="-1" aria-labelledby="modal-lg-update-label<?= $data->id_tim_lolos ?>" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Form Penilaian</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <input type="hidden" name="tim" value="<?= $data->tim ?>">
                              <input type="hidden" name="ketua" value="<?= $data->ketua ?>">
                              <input type="hidden" name="lomba" value="<?= $data->lomba ?>">
                              <input type="hidden" name="pembimbing" value="<?= $data->pembimbing ?>">
                              <input type="hidden" name="sekolah" value="<?= $data->sekolah ?>">
                              <input type="hidden" name="skor_nilai" value="<?= $data->skor_nilai ?>">
                              <div class="modal-body">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="status">Status Penilaian</label>
                                          <select class="form-control" id="status" name="status" required>
                                              <option selected><?= $data->status ?></option>
                                              <option value="Belum Lolos">Belum Lolos</option>
                                              <option value="Lolos">Lolos</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                          </div>
                      </div>
                  </div>
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

              <h2 class="az-content-title">Daftar Tim Lolos</h2>

              <div class="az-content-label mg-b-5">Informasi Tim Lolos</div>
              <p class="mg-b-20">Daftar tim yang berhasil lolos seleksi dan berhak melanjutkan ke tahap selanjutnya dalam kompetisi.</p>


              <br>

              <div class="table-responsive">
                  <table id="example" class="table table-striped">
                      <thead>
                          <tr>
                              <th style="width: 10px">No</th>
                              <th>Tim</th>
                              <th>Ketua</th>
                              <th>Kategori</th>
                              <th>Pembimbing</th>
                              <th>Sekolah</th>
                              <th>Nilai Skor</th>
                              <th>Status</th>
                              <th style="width: 200px">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1 ?>
                          <?php foreach ($dataTimLolosNew as $data) : ?>
                              <tr>
                                  <td><?= $i++ ?></td>
                                  <td><?= esc($data->tim) ?></td>
                                  <td><?= esc($data->ketua) ?></td>
                                  <td><?= esc($data->lomba) ?></td>
                                  <td><?= esc($data->pembimbing) ?></td>
                                  <td><?= esc($data->sekolah) ?></td>
                                  <td>
                                      <?php if ($data->skor_nilai >= 90 && $data->skor_nilai <= 100): ?>
                                          <span class="badge badge-primary p-2"><?= esc($data->skor_nilai) ?></span>
                                      <?php elseif ($data->skor_nilai >= 60 && $data->skor_nilai <= 80): ?>
                                          <span class="badge badge-success p-2"><?= esc($data->skor_nilai) ?></span>
                                      <?php elseif ($data->skor_nilai >= 0 && $data->skor_nilai <= 50): ?>
                                          <span class="badge badge-danger p-2"><?= esc($data->skor_nilai) ?></span>
                                      <?php else: ?>
                                          <span class="badge badge-secondary p-2"><?= esc($data->skor_nilai) ?></span>
                                      <?php endif; ?>
                                  </td>
                                  <td>
                                      <?php if ($data->status == 'Lolos'): ?>
                                          <span class="badge badge-success p-2">Lolos</span>
                                      <?php else: ?>
                                          <span class="badge badge-danger p-2">Tidak Lolos</span>
                                      <?php endif; ?>
                                  </td>
                                  <td>
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg-update<?= $data->id_tim_lolos ?>">
                                          Action
                                      </button>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>

              <hr class="mg-y-30">

              <div class="ht-40"></div>