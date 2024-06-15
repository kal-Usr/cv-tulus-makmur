<main role="main" class="container">
    <div class="row mt-4">
        <div class="col-md-3">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9">
            <div class="alert alert-success">
                Silakan selesaikan pembayaran dalam batas waktu yang ditentukan. Jika tidak, order Anda akan dihapus.
            </div>
            <div class="card">
                <div class="card-header bg-success text-light">Daftar Orders</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Sisa Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url("/myorder/detail/$row->invoice") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                        </td>
                                        <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                        <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                        <td style="color: black !important;">
                                            <?php $this->load->view('layouts/_status', ['status' => $row->status ]) ?>
                                        </td>
                                        <td id="countdown-<?= $row->id ?>"></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php foreach ($content as $row) : ?>
                var countDownDate<?= $row->id ?> = new Date().getTime() + 60000; // Menambahkan 1 menit (60,000 ms) dari waktu saat ini

                var x<?= $row->id ?> = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate<?= $row->id ?> - now;

                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    if (distance < 0) {
                        clearInterval(x<?= $row->id ?>);
                        document.getElementById("countdown-<?= $row->id ?>").innerHTML = "EXPIRED";

                        // Kirim data ke controller untuk menghapus status 'waiting'
                        $.post("<?= base_url('myorder/delete_expired_order') ?>", { order_id: <?= $row->id ?> }, function() {
                            location.reload(); // Refresh halaman setelah delete
                        });
                    } else {
                        document.getElementById("countdown-<?= $row->id ?>").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
                    }
                }, 1000);
            <?php endforeach; ?>
        });
    </script>
</main>
