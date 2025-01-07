<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
  </script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="BootstrapDash">

  <title><?= $title ?></title>

  <!-- vendor css -->
  <link href="asset_azia/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="asset_azia/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="asset_azia/lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="asset_azia/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

  <!-- azia CSS -->
  <link rel="stylesheet" href="asset_azia/css/azia.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .nav-link:hover {
      color: #3366ff !important;
      /* Warna biru primary Bootstrap */
    }

    /* Gaya untuk notifikasi */
    .notification {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      font-size: 14px;
      display: none;
    }

    /* Menampilkan notifikasi saat tombol di-hover */
    #unreadEmailBtn:hover+#notification {
      display: block;
    }
  </style>

</head>

<body>