<!-- ======= Hero Section ======= -->
 <?php $this->load->view('layouts/_alert') ?>
<section id="hero" class="hero d-flex align-items-center">
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 >Toko Tulus Makmur</h1>
      <div  data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="<?= base_url('home') ?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Lihat Produk</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" >
      <img src="<?= base_url('/assets/l/img/hero-img.png')?> " class="img-fluid" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->

<main id="main">
<!-- ======= Values Section ======= -->
<section id="values" class="values">

  <div class="container" >

    <header class="section-header">
      <h2>Cara Pembelian</h2>
      <p>        berikut tahapan cara pembelianya</p>
    </header>

    <div class="row">

      <div class="col-lg-4"  data-aos-delay="200">
        <div class="box">
          <img src="<?=  base_url('assets/l2/images/d.png') ?> " class="img-fluid" alt="">
          <h3>Pilih Produk</h3>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0"  data-aos-delay="400">
        <div class="box">
          <img src="<?=  base_url('assets/l2/images/c.png') ?>  " class="img-fluid" alt="">
          <h3>Checkout pada Keranjang</h3>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0"  data-aos-delay="600">
        <div class="box">
          <img src="<?=  base_url('assets/l2/images/z.png') ?> " class="img-fluid" alt="">
          <h3>Pembayaran</h3>
        </div>
      </div>

    </div>

  </div>

</section><!-- End Values Section -->




</main><!-- End #main -->