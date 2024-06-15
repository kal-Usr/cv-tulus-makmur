<!-- Navbar Start -->
<div class="mb-4">
      <?php $this->load->view('layouts/_navbar'); ?>
</div>
<!-- End Navbar -->

<!-- About Section -->
<section id="about" class="about section">
    <?php $this->load->view($page); ?>
</section>
<!-- End About -->

  <!-- footer section -->

  <script type="text/javascript" src="<?= base_url('/assets/l/js/jquery-3.4.1.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/assets/l/js/bootstrap.js') ?>"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?= base_url('/assets/l/js/main.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/css/all.min.css') ?> " />
  <!-- end google map js -->

</body>
</html>