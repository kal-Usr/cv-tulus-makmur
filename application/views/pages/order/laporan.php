<main role="main" class="container">
    <div class="row mt-4">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    <span>Laporan Order</span>
                </div>
                <div class="card-body">
                    <?= form_open('order/laporan') ?>
                    <div class="form-group">
                        <label for="tanggal_mulai" class="mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control mb-2" id="tanggal_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai" class="mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control mb-2" id="tanggal_selesai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                    <?= form_close() ?>
                    <button id="btnPrint" class="btn btn-danger mt-3">Print</button>
                </div>
            </div>
        </div>

        <!-- Tampilkan data laporan jika tersedia -->
        <div class="col-md-7">
            <?php if(isset($content)): ?>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <span>Data Laporan Order</span>
                </div>
                <div class="card-body">
                    <table id="laporanTable" class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url("/order/detail/$row->id") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                </td>
                                <td><?= date("d-m-Y", strtotime($row->date)) ?></td>
                                <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                <td>
                                    <?php $this->load->view('layouts/_status', ['status' => $row->status]) ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Import DataTables script dan plugin -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#laporanTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                className: 'btn btn-success mb-2',
                text: 'Export Excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ] // Specify which columns to include in Excel export
                }
            }
        ]
    });

    $('#btnPrint').on('click', function() {
        var tanggalMulai = $('#tanggal_mulai').val();
        var tanggalSelesai = $('#tanggal_selesai').val();
        if (tanggalMulai && tanggalSelesai) {
            var printUrl = '<?= base_url('order/print/') ?>' + tanggalMulai + '/' + tanggalSelesai;
            window.open(printUrl, '_self');
        } else {
            alert('Silakan pilih tanggal mulai dan tanggal selesai.');
        }
    });
});
</script>
