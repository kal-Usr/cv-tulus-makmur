<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .banner {
            height: 400px; /* Sesuaikan tinggi banner sesuai kebutuhan */
            background-image: url('<?= base_url('assets/images/banner.jpg') ?>');
            background-size: cover;
            background-position: center;
            position: relative; /* Menambahkan posisi relatif untuk tombol */
        }

        .btn-lihat-produk {
            position: absolute;
            bottom: -200px; /* Jarak dari bawah */
            left: 50%; /* Posisi horizontal di tengah */
            transform: translateX(-50%); /* Menggeser ke kiri sebesar setengah lebar tombol */
        }
    </style>
</head>
<body>

<!-- Navbar Menu -->
<?php $this->load->view('layouts/_navbar'); ?>
<br><br>
<br>
<br>
<br>

<!-- Banner -->
<div class="container-fluid banner">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-12 text-center">
            <button class="btn btn-primary btn-lg btn-lihat-produk"><a href="<?= base_url('home') ?>" class="text-white">Lihat Produk</a></button>
        </div>
    </div>
</div>

<!-- Informasi No Telp dan Alamat -->
<div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-phone fa-3x mb-3"></i>
                    <h5 class="card-title">Nomor Telepon</h5>
                    <p class="card-text"><br>0819-0242-8555</p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-map-marker-alt fa-3x mb-3"></i>
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text">Jl. H. Mansyur No.44, Pekauman Kulon, Kec. Dukuhturi, Kabupaten Tegal, Jawa Tengah 52192</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
