<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tulus Makmur</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="<?= base_url('/assets/l/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('/assets/l/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/l/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/l/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/l/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/l/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/l/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('/assets/l/css/style.css') ?>" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center">
        <img src="<?= base_url('/assets/l/img/logo.png') ?>" alt="">
        <span>Tulus Makmur Plywood</span>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url('/home') ?>">Home</a></li>
          <?php if ($this->session->userdata('role') == 'admin') : ?>
          <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('category') ?>" class="dropdown-item">Kategori</a></li>
              <li><a href="<?= base_url('product') ?>" class="dropdown-item">Produk</a></li>
              <li><a href="<?= base_url('order') ?>" class="dropdown-item">Order</a></li>
              <li><a href="<?= base_url('user') ?>" class="dropdown-item">Pengguna</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Kelola Kas</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('kasmasuk') ?>" class="dropdown-item">Kas Masuk</a></li>
              <li><a href="<?= base_url('kaskeluar') ?>" class="dropdown-item">Kas Keluar</a></li>
            </ul>
          </li>
            <li class="dropdown"><a href="#"><span>Tambah Transaksi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a href="<?= base_url('penjualan') ?>" class="dropdown-item">Transaksi Penjualan</a></li>
            </ul>
          </li>
          <?php elseif ($this->session->userdata('role') == 'pemilik') : ?>
          <li class="dropdown"><a href="#"><span>Laporan Kas</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('kasmasuk/laporan') ?>" class="dropdown-item">Kas Masuk</a></li>
              <li><a href="<?= base_url('kaskeluar/laporan') ?>" class="dropdown-item">Kas Keluar</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Laporan Pembelian</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('order/laporan') ?>" class="dropdown-item">Order</a></li>
              <li><a href="<?= base_url('penjualan/laporan') ?>" class="dropdown-item">Transaksi Penjualan</a></li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('role') == 'member') : ?>
          <li><a href="<?= base_url('about') ?>" class="nav-link">About</a></li>
          <li><a href="https://api.whatsapp.com/send?phone=6281902428555" class="nav-link">Kontak <i class="fas fa-headset"></i></a></li>
          <li><a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Keranjang (<?= getCart(); ?>)</a></li>
          <?php endif; ?>

          <?php if (!$this->session->userdata('is_login')) : ?>
            <li class="nav-item">
              <a href="<?= base_url('/login') ?>" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/register') ?>" class="nav-link">Register</a>
            </li>
          <?php else : ?>
             <li class="dropdown"><a href="#"><span> <?= $this->session->userdata('name') ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a></li>
                <?php if ($this->session->userdata('role') == 'member') : ?>
                <li><a href="<?= base_url("/myorder") ?>" class="dropdown-item">Orders</a></li>
                 <?php endif; ?>
                <li><a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->
