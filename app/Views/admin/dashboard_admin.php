<div class="az-content az-content-dashboard">
  <div class="container">
    <div class="az-content-body">
      <div class="az-dashboard-one-title">
        <div>
          <h2 class="az-dashboard-title">Hi, selamat datang kembali!</h2>
          <p class="az-dashboard-text">Dashboard admin Kaltech untuk mengelola kompetisi dan melihat data peserta/tim.</p>
        </div>
        <div class="az-content-header-right">
          <div class="media">
            <div class="media-body">
              <label>Date</label>
              <h6><?= $tanggalLengkap ?></h6>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-body">
              <label>Time</label>
              <h6><?= $jamSekarang ?></h6>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-body">
              <label>Event Category</label>
              <h6>All Categories</h6>
            </div><!-- media-body -->
          </div><!-- media -->
        </div>
      </div><!-- az-dashboard-one-title -->

      <div class="az-dashboard-nav">
        <nav class="nav">
          <a class="nav-link <?= (current_url() == base_url('/admin')) ? 'active text-primary' : '' ?>"
            href="/admin"
            style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="if (!this.classList.contains('active')) this.classList.remove('text-primary')">
            Overview
          </a>
          <a class="nav-link <?= (current_url() == base_url('/daftar-sponsor')) ? 'active text-primary' : '' ?>"
            href="/daftar-sponsor"
            style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="if (!this.classList.contains('active')) this.classList.remove('text-primary')">
            Tabel
          </a>
          <a class="nav-link <?= (current_url() == base_url('/user')) ? 'active text-primary' : '' ?>"
            href="/user"
            style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="if (!this.classList.contains('active')) this.classList.remove('text-primary')">
            Roles
          </a>
          <a class="nav-link <?= (current_url() == base_url('/email/list')) ? 'active text-primary' : '' ?>"
            href="/email/list"
            style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="if (!this.classList.contains('active')) this.classList.remove('text-primary')">
            Mail
          </a>
        </nav>


        <!-- <nav class="nav">
          <a class="nav-link" href="#" style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="this.classList.remove('text-primary')">
            <i class="far fa-save"></i> Save Report
          </a>
          <a class="nav-link" href="#" style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="this.classList.remove('text-primary')">
            <i class="far fa-file-pdf"></i> Export to PDF
          </a>
          <a class="nav-link" href="#" style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="this.classList.remove('text-primary')">
            <i class="far fa-envelope"></i> Send to Email
          </a>
          <a class="nav-link" href="#" style="text-decoration: none;"
            onmouseover="this.classList.add('text-primary')"
            onmouseout="this.classList.remove('text-primary')">
            <i class="fas fa-ellipsis-h"></i>
          </a>
        </nav> -->
      </div>



      <div class="row row-sm mg-b-20">
        <div class="col-lg-7 ht-lg-100p">
          <div class="card card-dashboard-one">
            <div class="card-header">
              <div>
                <h6 class="card-title">Tim yang Sudah dan Belum Submit Tugas</h6>
                <p class="card-text">Jumlah tim yang sudah dan belum submit tugas pada rentang tanggal saat ini.</p>
              </div>
              <!-- <div class="btn-group">
                <button class="btn active">Hari Ini</button>
                <button class="btn">Minggu Ini</button>
                <button class="btn">Bulan Ini</button>
              </div> -->
            </div><!-- card-header -->
            <div class="card-body">
              <div class="card-body-top">
                <div>
                  <label class="mg-b-0">Tim yang Sudah Submit</label>
                  <h2><?= $dataSubmit ?></h2> <!-- Update dengan jumlah tim yang sudah submit -->
                </div>
                <div>
                  <label class="mg-b-0">Tim yang Belum Submit</label>
                  <h2><?= $dataIsNotSubmit ?></h2> <!-- Update dengan jumlah tim yang belum submit -->
                </div>
                <div>
                  <label class="mg-b-0">Persentase Submit</label>
                  <h2>75%</h2> <!-- Update dengan persentase tim yang sudah submit -->
                </div>
                <div>
                  <label class="mg-b-0">Total Tim</label>
                  <h2><?= $dataTimLomba ?></h2> <!-- Update dengan total jumlah tim -->
                </div>
              </div><!-- card-body-top -->
              <div class="flot-chart-wrapper">
                <div id="flotChart" class="flot-chart"></div>
              </div><!-- flot-chart-wrapper -->
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->
        <div class="col-lg-5 mg-t-20 mg-lg-t-0">
          <div class="row row-sm">
            <div class="col-sm-6">
              <div class="card card-dashboard-two">
                <div class="card-header">
                  <h6><?= $dataSubmit ?><i class="icon ion-md-trending-up tx-success"></i> <small>+5% dari sebelumnya</small></h6>
                  <p>Tim yang Sudah Submit</p>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div id="flotChart1" class="flot-chart"></div>
                  </div><!-- chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-sm-6 mg-t-20 mg-sm-t-0">
              <div class="card card-dashboard-two">
                <div class="card-header">
                  <h6><?= $dataIsNotSubmit ?> <i class="icon ion-md-trending-down tx-danger"></i> <small>-5% dari sebelumnya</small></h6>
                  <p>Tim yang Belum Submit</p>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div id="flotChart2" class="flot-chart"></div>
                  </div><!-- chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-sm-12 mg-t-20">
              <div class="card card-dashboard-three">
                <div class="card-header">
                  <p>Total Tugas yang Disubmit</p>
                  <h6><?= $dataSubmit ?> <small class="tx-success"><i class="icon ion-md-arrow-up"></i> <?= $dataSubmit ?> Tim Baru Submit</small></h6>
                  <small>Jumlah total tugas yang sudah disubmit oleh tim pada rentang waktu yang ditentukan.</small>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="chart"><canvas id="chartBar5"></canvas></div>
                </div>
              </div>
            </div>
          </div><!-- row -->
        </div><!--col -->
      </div><!-- row -->


      <div class="row row-sm mg-b-20">
        <div class="col-lg-4">
          <div class="card card-dashboard-pageviews">
            <div class="card-header">
              <h6 class="card-title">Page Views by Page Title</h6>
              <p class="card-text">This report is based on 100% of sessions.</p>
            </div><!-- card-header -->
            <div class="card-body">
              <div class="az-list-item">
                <div>
                  <h6>Data Sekolah</h6>
                  <a href="/daftar-sekolah" target="_blank"><span>Lihat data sekolah</span></a>
                </div>
                <div>
                  <h6 class="tx-primary"><?= $dataSekolah ?></h6>
                  <span>(Total sekolah - <?= $dataSekolah ?>)</span>
                </div>
              </div><!-- list-group-item -->
              <div class="az-list-item">
                <div>
                  <h6>Data Tim Lomba</h6>
                  <a href="/daftar-lomba" target="_blank"><span>Lihat data tim lomba</span></a>
                </div>
                <div>
                  <h6 class="tx-primary"><?= $dataTimLomba ?></h6>
                  <span>(Total tim lomba - <?= $dataTimLomba ?>)</span>
                </div>
              </div><!-- list-group-item -->
              <div class="az-list-item">
                <div>
                  <h6>Data Peserta</h6>
                  <a href="/daftar-peserta" target="_blank"><span>Lihat data peserta</span></a>
                </div>
                <div>
                  <h6 class="tx-primary"><?= $dataPeserta ?></h6>
                  <span>(Total peserta - <?= $dataPeserta ?>)</span>
                </div>
              </div><!-- list-group-item -->
              <div class="az-list-item">
                <div>
                  <h6>Data Pembimbing</h6>
                  <a href="/daftar-pembimbing" target="_blank"><span>Lihat data pembimbing</span></a>
                </div>
                <div>
                  <h6 class="tx-primary"><?= $dataPembimbing ?></h6>
                  <span>(Total pembimbing - <?= $dataPembimbing ?>)</span>
                </div>
              </div><!-- list-group-item -->
            </div><!-- card-body -->
          </div><!-- card -->

        </div><!-- col -->
        <div class="col-lg-8 mg-t-20 mg-lg-t-0">
          <div class="card card-dashboard-four">
            <div class="card-header">
              <h6 class="card-title">Sessions by Channel</h6>
            </div><!-- card-header -->
            <div class="card-body row">
              <div class="col-md-6 d-flex align-items-center">
                <div class="chart"><canvas id="chartDonut"></canvas></div>
              </div><!-- col -->
              <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                <div class="az-traffic-detail-item">
                  <div>
                    <span>Organic Search</span>
                    <span>1,320 <span>(25%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-purple wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>Email</span>
                    <span>987 <span>(20%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-primary wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>Referral</span>
                    <span>2,010 <span>(30%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-info wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>Social</span>
                    <span>654 <span>(15%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-teal wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>Other</span>
                    <span>400 <span>(10%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-gray-500 wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
              </div><!-- col -->
            </div><!-- card-body -->
          </div><!-- card-dashboard-four -->
        </div><!-- col -->
      </div><!-- row -->

      <div class="row row-sm mg-b-20 mg-lg-b-0">
        <div class="col-lg-5 col-xl-4">
          <div class="row row-sm">
            <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
              <div class="card card-dashboard-five">
                <div class="card-header">
                  <h6 class="card-title">Data Tim Lolos/Belum Lolos</h6>
                  <span class="card-text">Informasi mengenai status tim apakah sudah lolos atau belum dalam seleksi.</span>
                </div><!-- card-header -->
                <div class="card-body row row-sm">
                  <div class="col-6 d-sm-flex align-items-center">
                    <div class="card-chart bg-primary">
                      <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                    </div>
                    <div>
                      <label>Tim Lolos</label>
                      <h4><?= count($dataTimLolos) ?></h4>
                    </div>
                  </div><!-- col -->
                  <div class="col-6 d-sm-flex align-items-center">
                    <div class="card-chart bg-purple">
                      <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                    </div>
                    <div>
                      <label>Tim Belum Lolos</label>
                      <h4><?= $dataTimNotlos ?></h4>
                    </div>
                  </div><!-- col -->
                </div><!-- card-body -->
              </div><!-- card-dashboard-five -->
            </div><!-- col -->
            <div class="col-md-6 col-lg-12">
              <div class="card card-dashboard-five">
                <div class="card-header">
                  <h6 class="card-title">Sessions</h6>
                  <span class="card-text"> A session is the period time a user is actively engaged with your website, app, etc.</span>
                </div><!-- card-header -->
                <div class="card-body row row-sm">
                  <div class="col-6 d-sm-flex align-items-center">
                    <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                      <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>
                    </div>
                    <div>
                      <label>% New Sessions</label>
                      <h4>26.80%</h4>
                    </div>
                  </div><!-- col -->
                  <div class="col-6 d-sm-flex align-items-center">
                    <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                      <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>
                    </div>
                    <div>
                      <label>Pages/Session</label>
                      <h4>1,005</h4>
                    </div>
                  </div><!-- col -->
                </div><!-- card-body -->
              </div><!-- card-dashboard-five -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- col-lg-3 -->
        <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
          <div class="card card-table-one">
            <h6 class="card-title">Daftar Tim Lomba Lolos</h6>
            <p class="az-content-text mg-b-20">Berikut adalah daftar tim yang berhasil lolos seleksi pada lomba ini.</p>
            <div class="table-responsive">
              <table class="table" id="example" style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th scope="col" style="text-align: left; padding: 10px; background-color: #f4f4f4; font-weight: bold; border: 1px solid #ddd;">#</th>
                    <th scope="col" style="text-align: left; padding: 10px; background-color: #f4f4f4; font-weight: bold; border: 1px solid #ddd;">Tim</th>
                    <th scope="col" style="text-align: left; padding: 10px; background-color: #f4f4f4; font-weight: bold; border: 1px solid #ddd;">Kategori</th>
                    <th scope="col" style="text-align: left; padding: 10px; background-color: #f4f4f4; font-weight: bold; border: 1px solid #ddd;">Skor Nilai</th>
                    <th scope="col" style="text-align: left; padding: 10px; background-color: #f4f4f4; font-weight: bold; border: 1px solid #ddd;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($dataTimLolos as $data) : ?>
                    <tr style="border: 1px solid #ddd;">
                      <td style="text-align: left; padding: 10px; border: 1px solid #ddd;"><?= $i++ ?></td>
                      <td style="text-align: left; padding: 10px; border: 1px solid #ddd;"><?= htmlspecialchars($data->tim) ?></td>
                      <td style="text-align: left; padding: 10px; border: 1px solid #ddd;"><?= htmlspecialchars($data->lomba) ?></td>
                      <td style="text-align: left; padding: 10px; border: 1px solid #ddd;"><?= htmlspecialchars($data->skor_nilai) ?></td>
                      <td style="text-align: left; padding: 10px; border: 1px solid #ddd;"><?= htmlspecialchars($data->status) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div><!-- table-responsive -->
          </div><!-- card -->
        </div><!-- col-lg -->
      </div><!-- row -->
    </div><!-- az-content-body -->
  </div>
</div><!-- az-content -->