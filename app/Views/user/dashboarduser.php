<!-- Modal -->

<?php foreach ($dataTimLomba as $data): ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Submit Tugas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mb-3">
            <h4>Informasi</h4>
            <ul>
              <li>Tim : <?= $data->nama_tim ?></li>
              <li>Ketua : <?= $data->ketua_tim ?></li>
              <li>Kategori : <?= $data->nama ?></li>
              <li>Pembimbing : <?= $data->nama_pembimbing ?></li>
              <li>Sekolah : <?= $data->nama_sekolah ?></li>
              <li>Jam : <?= $jamSekarang ?></li>
              <li>Tgl : <?= $tanggalLengkap ?></li>
            </ul>
          </div>
          <form action="/user-dashboarduser/insert" method="post">
            <?php csrf_field() ?>
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="id_submit_pengumpulan" value="">
                <input type="hidden" name="tim" value="<?= $data->nama_tim ?>">
                <input type="hidden" name="ketua" value="<?= $data->ketua_tim ?>">
                <input type="hidden" name="lomba" value="<?= $data->nama ?>">
                <input type="hidden" name="pembimbing" value="<?= $data->nama_pembimbing ?>">
                <input type="hidden" name="sekolah" value="<?= $data->nama_sekolah ?>">
                <input type="hidden" name="status_pengumpulan" value="Telah Submit">
                <input type="hidden" name="status_penilaian" value="Belum Dinilai">
                <input type="hidden" name="skor_nilai" value="0">
                <input type="hidden" name="feedback" value="">
                <input type="hidden" name="tgl" value="<?= $tanggalLengkap ?>">
                <input type="hidden" name="jam" value="<?= $jamSekarang ?>">
                <label for="exampleInputEmail1">Link Penugasan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="link_tugas" placeholder="Masukkan link penugasan">
              </div>
            </div>
            <!-- /.card-body -->

            <!-- <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Submit Tugas</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php foreach ($dataTimLolos as $nilai): ?>
  <div class="modal fade" id="modalNilai" tabindex="-1" aria-labelledby="modalNilaiLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nilai Tugas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mb-3">
            <h4>Informasi</h4>
            <ul>
              <li>Tim : <?= $nilai->tim ?></li>
              <li>Ketua : <?= $nilai->ketua ?></li>
              <li>Kategori : <?= $nilai->lomba ?></li>
              <li>Pembimbing : <?= $nilai->pembimbing ?></li>
              <li>Sekolah : <?= $nilai->sekolah ?></li>
              <li>Sekolah : <?= $nilai->skor_nilai ?></li>
              <li>Sekolah : <?= $nilai->status ?></li>
            </ul>
          </div>
          <!-- /.card-body -->

          <!-- <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>



<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
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
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Halo Tim!</h3>
            <h6 class="font-weight-normal mb-0">
              Semangat Dalam Mengerjakan Tugas Lomba Ini,
              <span class="text-primary">
                Tapi Jangan Terlalu Terbebani Ya!</span>
            </h6>
          </div>
          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button
                  class="btn btn-sm btn-light bg-white"
                  type="button">
                  <i class="mdi mdi-calendar"></i> <?= $tanggalLengkap; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($dataTimLomba as $data): ?>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Tim <?= $data->nama_tim ?></p>
              <p class="font-weight-500">
                Tim <?= $data->nama_tim ?> telah mendaftar ke lomba kaltek
                pada divisi <?= $data->nama ?>, team ini memiliki anggota:
              </p>
              <div class="d-flex mt-4">
                <div class="row">
                  <p class="font-weight-500 text-muted"><i class="fa-solid fa-user text-primary"></i> Ketua</p>
                  <h5 class="font-weight-medium"><?= $data->ketua_tim ?></h5>
                </div>
                <div class="row d-flex flex-column">
                  <p class="font-weight-500 text-muted"><i class="fa-solid fa-user text-primary"></i> Anggota</p>
                  <h5 class="font-weight-medium"><?= $data->anggota ?></h5>
                </div>
              </div>
              <div class="d-flex flex-wrap">
                <div class="me-5 mt-3">
                  <p class="text-muted"><i class="fa-solid fa-user text-primary"></i> Pembimbing</p>
                  <h5 class="text-primary font-weight-medium">
                    <?= $data->nama_pembimbing ?>
                  </h5>
                </div>
                <div class="me-5 mt-3">
                  <p class="text-muted"><i class="fa-solid fa-school text-primary"></i> Sekolah</p>
                  <h5 class="text-primary font-weight-medium">
                    <?= $data->nama_sekolah ?>
                  </h5>
                </div>
              </div>
              <br>
              <?php if (!empty($dataTimDinilai)) : ?>
                <?php foreach ($dataTimDinilai as $dataNilai) : ?>
                  <button
                    type="button"
                    class="btn btn-primary btn-icon-text"
                    data-bs-toggle="modal"
                    data-bs-target="#modalNilai" <?php echo ($dataNilai->status_penilaian === 'Sudah Dinilai') ? '' : 'disabled'; ?>>
                    <i class="fa-solid fa-calendar-days"></i> Form Penilaian
                  </button>
                <?php endforeach; ?>
              <?php else : ?>
                <!-- <button
                  type="button"
                  class="btn btn-primary btn-icon-text"
                  data-bs-toggle="modal"
                  data-bs-target="#modalNilai">
                  <i class="fa-solid fa-calendar-days"></i> Form Penilaian
                </button> -->
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>


        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <!-- nanti diubah jadi gambar kategorinya misal kategori mikrotik jadi gambar mikrotik -->
              <img
                src="userStyle/dist/assets/images/dashboard/people.svg"
                alt="people" />
              <div class="weather-info">
                <div class="d-flex">
                  <div>
                    <h2 class="mb-0 font-weight-normal">
                      <i class="mdi mdi-content-duplicate me-0"></i>
                    </h2>
                  </div>
                  <div class="ms-2">
                    <h4 class="location font-weight-normal">Kategori</h4>
                    <?php foreach ($dataKategori as $data): ?>
                      <h6 class="font-weight-normal"><?= esc($data->nama); ?></h6>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="deadline text-right mb-3">
              <p class="mb-2 text-muted"><i class="fa-regular fa-clock text-primary"></i> Deadline</p>
              <h3 class="mb-0">12:00</h3>
              <p class="font-weight-500">14 Januari 2025</p>
            </div>
            <?php foreach ($dataKategori as $data) : ?>
              <p class="card-title mb-2">Preview Tugas Kategori <?= $data->nama ?></p>
            <?php endforeach; ?>
            <p class="mb-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Ab suscipit maxime perspiciatis. Neque beatae cumque
              consectetur corrupti, facere enim quidem aliquam numquam
              consequatur unde, mollitia velit cupiditate minus
              necessitatibus fugit.
            </p>
            <p class="card-title mb-2">Aturan Lomba</p>
            <ul class="mb-2">
              <li>Unduh Soal dan Peraturan</li>
              <li>Baca dan cermati Soal dan Peraturan</li>
              <li>Dilarang Menggunakan AI Apapun</li>
              <li>Usahakan kumpulkan sesuai deadline yg sudah ditentukan</li>
              <li>Dilarang bekerjasama dengan selain anggota Timnya</li>
              <li>Jika didapati laporan mirip/sama dengan Tim lain otomatis akan di diskualifikasi</li>
              <li>Laporan dikerjakan sesuai template yang diberikan panitia</li>
              <li>Laporan Pengumpulan harus dalam bentuk file PDF</li>
              <li>Setelah dikumpulkan lalu klik tombol submit tugas agar tugas nya dibaca selesai</li>
              <li>dan seterusnya</li>
            </ul>
            <div class="template-demo mt-2 d-flex justify-content-between align-items-center flex-wrap">
              <div class="buttons d-flex my-3">
                <?php foreach ($dataKategori as $data) : ?>
                  <a href="<?= $data->link_peraturan ?>" class="btn btn-outline-primary btn-icon-text me-2" target="_blank" download>
                    <i class="ti-download btn-icon-prepend"></i>Unduh Peraturan
                  </a>
                <?php endforeach; ?>
                <?php foreach ($dataSoal as $data) : ?>
                  <a href="<?= $data->link_soal ?>" class="btn btn-outline-primary btn-icon-text me-2" target="_blank" download>
                    <i class="ti-download btn-icon-prepend"></i>Unduh Tugas
                  </a>
                <?php endforeach; ?>
                <?php if (!empty($daftarTimSelesai)) : ?>
                  <?php foreach ($daftarTimSelesai as $dataTugas) : ?>
                    <button
                      type="button"
                      class="btn btn-primary btn-icon-text"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                      <?php echo ($dataTugas->status_pengumpulan === 'Telah Submit') ? 'disabled' : ''; ?>>
                      <i class="ti-file btn-icon-prepend"></i> Submit Tugas
                    </button>
                  <?php endforeach; ?>
                <?php else : ?>
                  <button
                    type="button"
                    class="btn btn-primary btn-icon-text"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="ti-file btn-icon-prepend"></i> Submit Tugas
                  </button>
                <?php endif; ?>


              </div>
            </div>


          </div>

        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-2">Daftar Tim</h4>
            <p class="font-weight-500">Kami harap to do list simple ini dapat sedikit membantu dalam mengatur kegiatan dan tugas team anda</p>
            <div class="list-wrapper pt-2">
              <ul
                class="d-flex flex-column todo-list todo-list-custom col-12">
                <?php foreach ($daftarTimSelesai as $data) : ?>
                  <li>
                    <div class="form-check form-check-flat">
                      <div class="col-sm d-flex mb-2">
                        <div class="row">
                          <small class="text-muted"><i class="fa-solid fa-school text-primary"></i> Nama Tim</small>
                          <h4 class="font-weight-medium">
                            <?= $data->tim ?>
                          </h4>
                        </div>
                        <div class="row">
                          <small class="text-muted"><i class="fa-regular fa-clock text-primary"></i> Jam</small>
                          <h4 class="font-weight-medium"><?= $data->jam ?></h4>
                        </div>
                      </div>
                      <div class="col-sm">
                        <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                          <?= $data->status_pengumpulan ?>
                        </button>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->