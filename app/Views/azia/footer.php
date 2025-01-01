<div class="az-footer ht-40">
  <div class="container ht-100p pd-t-0-f">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © himatrkj <?= date('Y'); ?> / desainnya.ereenn</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
  </div><!-- container -->
</div><!-- az-footer -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="asset_azia/lib/jquery/jquery.min.js"></script>
<script src="asset_azia/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="asset_azia/lib/ionicons/ionicons.js"></script>
<script src="asset_azia/lib/jquery.flot/jquery.flot.js"></script>
<script src="asset_azia/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="asset_azia/lib/chart.js/Chart.bundle.min.js"></script>
<script src="asset_azia/lib/peity/jquery.peity.min.js"></script>

<script src="asset_azia/js/azia.js"></script>
<script src="asset_azia/js/chart.flot.sampledata.js"></script>
<script src="asset_azia/js/dashboard.sampledata.js"></script>
<script src="asset_azia/js/jquery.cookie.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
    // Inisialisasi tooltip untuk elemen yang memiliki atribut data-bs-toggle="tooltip"
    var tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>


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
          [<?= $dataSubmit ?>, <?= $dataSubmit ?>],
          [<?= $dataSubmit ?>, <?= $dataSubmit ?>],
          [<?= $dataSubmit ?>, <?= $dataSubmit ?>],
          [<?= $dataSubmit ?>, <?= $dataSubmit ?>],
        ],
        tickColor: '#eee'
      },
      xaxis: {
        show: true,
        color: '#fff',
        ticks: [
          [<?= $dataIsNotSubmit ?>, <?= $dataIsNotSubmit ?>],
          [<?= $dataIsNotSubmit ?>, <?= $dataIsNotSubmit ?>],
          [<?= $dataIsNotSubmit ?>, <?= $dataIsNotSubmit ?>],
          [<?= $dataIsNotSubmit ?>, <?= $dataIsNotSubmit  ?>]
        ],
      }
    });

    $.plot('#flotChart1', [{
      data: <?= $dataSubmit ?>,
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
      data: <?= $dataIsNotSubmit  ?>,
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
        labels: [<?= $dataSubmit ?>],
        datasets: [{
          data: [<?= $dataSubmit ?>],
          backgroundColor: '#560bd0'
        }, {
          data: [<?= $dataIsNotSubmit  ?>],
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
</script>
</body>

</html>