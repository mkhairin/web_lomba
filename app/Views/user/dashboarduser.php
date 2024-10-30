<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Submit Tugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Link Penugasan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan link penugasan">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
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
                <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="ti-file btn-icon-prepend"></i> Submit Tugas
                </button>
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
                <?php for ($i = 1; $i < 5; $i++) : ?>
                  <li>
                    <div class="form-check form-check-flat">
                      <div class="col-sm d-flex mb-2">
                        <div class="row">
                          <small class="text-muted"><i class="fa-solid fa-school text-primary"></i> Nama Tim</small>
                          <h4 class="font-weight-medium">
                            Paradise
                          </h4>
                        </div>
                        <div class="row">
                          <small class="text-muted"><i class="fa-regular fa-clock text-primary"></i> Jam</small>
                          <h4 class="font-weight-medium"> 12:00</h4>
                        </div>
                      </div>
                      <div class="col-sm">
                        <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                          Menyelesaikan Tugas
                        </button>
                      </div>
                    </div>
                  </li>
                <?php endfor; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->