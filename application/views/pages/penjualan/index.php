<main role="main" class="container mt-4">
     <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <span>Transaksi Penjualan</span>
                    <a href="<?= base_url('penjualan/create') ?>" class="btn btn-sm btn-success text-light">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $index => $item): ?>
                                    <tr>
                                        <td><?= $index + 1 + (($current_page - 1) * $per_page) ?></td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->tanggal ?></td>
                                        <td><?= $item->detail ?></td>
                                        <td><?= $item->total ?></td>
                                        <td>
                                            <a href="<?= base_url('penjualan/edit/' . $item->idpenjualan) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('penjualan/delete/' . $item->idpenjualan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                  <div class="row">
    <div class="col-md-10 mx-auto">
        <nav aria-label="Page navigation example">
            <?= $pagination ?>
        </nav>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</main>
