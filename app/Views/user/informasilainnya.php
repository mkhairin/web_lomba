<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="deadline text-right mb-3 mx-2">
      <p class="mb-2 text-muted"><i class="fa-regular fa-clock text-primary"></i> Deadline</p>
      <?php foreach ($dataDeadlineLomba as $deadline): ?>
        <h3 class="mb-0"><?= $deadline->deadline; ?></h3>
        <p id="countdown-<?= $deadline->id_deadline; ?>" class="font-weight-500 text-danger"></p>
      <?php endforeach; ?>

    </div>

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
                  <th class="border-bottom pb-2">Pembimbing</th>
                  <th class="border-bottom pb-2">Ketua</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dataTimLombaAll as $data) : ?>
                  <tr>
                    <td class="ps-0"><?= $data->nama_tim ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->nama_sekolah ?></td>
                    <td><?= $data->nama_pembimbing ?></td>
                    <td class="text-muted"><?= $data->ketua_tim ?></td>
                  </tr>
                <?php endforeach; ?>
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
            <?php foreach ($dataTimLombaNama as $data) : ?>
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
                    <th class="ps-0 pb-2 border-bottom">Nama Tim</th>
                    <th class="border-bottom pb-2">Sekolah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataTimLomba as $data) : ?>
                    <tr>
                      <td class="ps-0"><?= $data->nama_tim ?></td>
                      <td><?= $data->nama_sekolah ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>



    </div>
    <!-- content-wrapper ends -->
  </div>