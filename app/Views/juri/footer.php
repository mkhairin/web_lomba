<div class="az-footer ht-40">
  <div class="container ht-100p pd-t-0-f">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © himatrkj <?= date('Y'); ?> / desainnya.ereenn</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
  </div><!-- container -->
</div><!-- az-footer -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="/asset_azia/lib/jquery/jquery.min.js"></script>
<script src="/asset_azia/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/asset_azia/lib/ionicons/ionicons.js"></script>
<script src="/asset_azia/lib/jquery.flot/jquery.flot.js"></script>
<script src="/asset_azia/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="/asset_azia/lib/chart.js/Chart.bundle.min.js"></script>
<script src="/asset_azia/lib/peity/jquery.peity.min.js"></script>

<script src="/asset_azia/js/azia.js"></script>
<script src="/asset_azia/js/chart.flot.sampledata.js"></script>
<script src="/asset_azia/js/dashboard.sampledata.js"></script>
<script src="/asset_azia/js/jquery.cookie.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Toast Bootstrap
    var toastList = [...document.querySelectorAll('.toast')].map(toastEl => new bootstrap.Toast(toastEl));

    // Ambil elemen badge dan toast
    const unreadEmailBadge = document.getElementById('unreadEmailBadge');
    const unreadToast = document.getElementById('unreadToast');

    // Cek jika elemen tersedia
    if (unreadEmailBadge && unreadToast) {
      // Inisialisasi Toast jika elemen tersedia
      const toastInstance = new bootstrap.Toast(unreadToast);

      // Tambahkan event listener untuk menampilkan toast ketika hover
      unreadEmailBadge.addEventListener('mouseenter', function() {
        // Tampilkan toast ketika badge dihover
        toastInstance.show();
      });
    }
  });
</script>

<!-- Loading Spinner -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Event untuk semua link (<a>) dan form
    const links = document.querySelectorAll('a');
    const forms = document.querySelectorAll('form');

    // Event untuk klik link
    links.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href && href !== '#' && !href.startsWith('javascript')) {
          e.preventDefault(); // Mencegah navigasi langsung
          Swal.fire({
            title: 'Loading...',
            html: 'Please wait while the page loads.',
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
          setTimeout(() => {
            window.location.href = href; // Navigasi ke halaman
          }, 500); // Delay agar efek terlihat
        }
      });
    });

    // Event untuk submit form
    forms.forEach(form => {
      form.addEventListener('submit', function() {
        Swal.fire({
          title: 'Loading...',
          html: 'Submitting data, please wait.',
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      });
    });
  });
</script>


<script>
  // Fungsi untuk inisialisasi countdown
  function initializeCountdown(deadlineId, deadlineTime) {
    const deadline = new Date(deadlineTime).getTime();

    const countdownInterval = setInterval(() => {
      const now = new Date().getTime();
      const distance = deadline - now;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById(`countdown-${deadlineId}`).innerText = "EXPIRED";
        return;
      }

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById(`countdown1-${deadlineId}`).innerText = "EXPIRED";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById(`countdown-${deadlineId}`).innerText =
        `${days}d ${hours}h ${minutes}m ${seconds}s`;

      document.getElementById(`countdown1-${deadlineId}`).innerText =
        `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }, 1000);
  }

  // Data deadline dari server
  const deadlines = <?= json_encode($dataDeadlineLomba); ?>;

  // Inisialisasi countdown untuk setiap deadline
  deadlines.forEach(deadline => {
    initializeCountdown(deadline.id_deadline, deadline.deadline);
  });
</script>

<script>
  new DataTable('#example');

  $(function() {
    'use strict'

    var plot = $.plot('#flotChart', [{
      data: flotSampleData3,
      color: '#007bff',
      lines: {
        fillColor: {
          colors: [{
            opacity: 0
          }, {
            opacity: 0.2
          }]
        }
      }
    }, {
      data: flotSampleData4,
      color: '#560bd0',
      lines: {
        fillColor: {
          colors: [{
            opacity: 0
          }, {
            opacity: 0.2
          }]
        }
      }
    }], {
      series: {
        shadowSize: 0,
        lines: {
          show: true,
          lineWidth: 2,
          fill: true
        }
      },
      grid: {
        borderWidth: 0,
        labelMargin: 8
      },
      yaxis: {
        show: true,
        min: 0,
        max: 100,
        ticks: [
          [0, ''],
          [20, '20K'],
          [40, '40K'],
          [60, '60K'],
          [80, '80K']
        ],
        tickColor: '#eee'
      },
      xaxis: {
        show: true,
        color: '#fff',
        ticks: [
          [25, 'OCT 21'],
          [75, 'OCT 22'],
          [100, 'OCT 23'],
          [125, 'OCT 24']
        ],
      }
    });

    $.plot('#flotChart1', [{
      data: dashData2,
      color: '#00cccc'
    }], {
      series: {
        shadowSize: 0,
        lines: {
          show: true,
          lineWidth: 2,
          fill: true,
          fillColor: {
            colors: [{
              opacity: 0.2
            }, {
              opacity: 0.2
            }]
          }
        }
      },
      grid: {
        borderWidth: 0,
        labelMargin: 0
      },
      yaxis: {
        show: false,
        min: 0,
        max: 35
      },
      xaxis: {
        show: false,
        max: 50
      }
    });

    $.plot('#flotChart2', [{
      data: dashData2,
      color: '#007bff'
    }], {
      series: {
        shadowSize: 0,
        bars: {
          show: true,
          lineWidth: 0,
          fill: 1,
          barWidth: .5
        }
      },
      grid: {
        borderWidth: 0,
        labelMargin: 0
      },
      yaxis: {
        show: false,
        min: 0,
        max: 35
      },
      xaxis: {
        show: false,
        max: 20
      }
    });


    //-------------------------------------------------------------//


    // Line chart
    $('.peity-line').peity('line');

    // Bar charts
    $('.peity-bar').peity('bar');

    // Bar charts
    $('.peity-donut').peity('donut');

    var ctx5 = document.getElementById('chartBar5').getContext('2d');
    new Chart(ctx5, {
      type: 'bar',
      data: {
        labels: [0, 1, 2, 3, 4, 5, 6, 7],
        datasets: [{
          data: [2, 4, 10, 20, 45, 40, 35, 18],
          backgroundColor: '#560bd0'
        }, {
          data: [3, 6, 15, 35, 50, 45, 35, 25],
          backgroundColor: '#cad0e8'
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          enabled: false
        },
        legend: {
          display: false,
          labels: {
            display: false
          }
        },
        scales: {
          yAxes: [{
            display: false,
            ticks: {
              beginAtZero: true,
              fontSize: 11,
              max: 80
            }
          }],
          xAxes: [{
            barPercentage: 0.6,
            gridLines: {
              color: 'rgba(0,0,0,0.08)'
            },
            ticks: {
              beginAtZero: true,
              fontSize: 11,
              display: false
            }
          }]
        }
      }
    });

    // Donut Chart
    var datapie = {
      labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
      datasets: [{
        data: [25, 20, 30, 15, 10],
        backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
      }]
    };

    var optionpie = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false,
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    };

    // For a doughnut chart
    var ctxpie = document.getElementById('chartDonut');
    var myPieChart6 = new Chart(ctxpie, {
      type: 'doughnut',
      data: datapie,
      options: optionpie
    });

  });

  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>

</html>