<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="col-12 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Tim Terdaftar</p>
          <div class="table-responsive">
            <table class="table table-striped bg-primary display expandable-table" id="myTable3">
              <thead>
                <tr>
                  <th class="ps-0 pb-2 border-bottom">Nama Tim</th>
                  <th class="border-bottom pb-2">Kategori</th>
                  <th class="border-bottom pb-2">Sekolah</th>
                  <th class="border-bottom pb-2">Ketua</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ps-0">Team Alpha</td>
                  <td>Mikrotik</td>
                  <td>SMK Pusaka</td>
                  <td class="text-muted">Dewi Santika</td>
                </tr>
                <tr>
                  <td class="ps-0">Team Beta</td>
                  <td>Programming</td>
                  <td>SMA Negeri 1</td>
                  <td class="text-muted">Andi Rahmat</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 stretch-card grid-margin">
        <div class="card">
          <div class="card-body">
            <?php foreach ($dataTimLomba as $data) : ?>
              <p class="card-title mb-0">Tim Kategori <?= $data->nama ?></p>
            <?php endforeach; ?>
            <div class="table-responsive">
              <table class="table table-striped bg-primary display expandable-table" id="myTable2">
                <thead>
                  <tr>
                    <th class="ps-0 pb-2 border-bottom">Nama Tim</th>
                    <th class="border-bottom pb-2">Kategori</th>
                    <th class="border-bottom pb-2">Sekolah</th>
                    <th class="border-bottom pb-2">Ketua</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataTimLomba as $data) : ?>
                    <tr>
                      <td class="ps-0"><?= $data->nama_tim ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->nama_sekolah ?></td>
                      <td class="text-muted"><?= $data->ketua_tim ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Daftar Sekolah</p>
            <div class="table-responsive">
              <table class="table table-striped bg-primary display expandable-table" id="myTable">
                <thead>
                  <tr>
                    <th class="ps-0 pb-2 border-bottom">Sekolah</th>
                    <th class="border-bottom pb-2">Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="ps-0">SMA Pusaka</td>
                    <td>Bali</td>
                  </tr>
                  <tr>
                    <td class="ps-0">SMA Negeri 1</td>
                    <td>Jakarta</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>



    </div>
    <!-- content-wrapper ends -->
  </div>