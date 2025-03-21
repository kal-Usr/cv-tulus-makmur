<main role="main" class="container mt-4">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <span>Kas Keluar</span>
                    <a href="<?= base_url('kaskeluar/create') ?>" class="btn btn-sm btn-success text-light mb-2">Tambah</a>
                    <div class="float-right">
                        <form action="<?= base_url("kaskeluar/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('kaskeluar/reset') ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eraser"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Uang Keluar</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kaskeluar as $index => $row) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $row->keterangan ?></td>
                                            <td><?= 'Rp ' . number_format($row->uangkeluar, 0, ',', '.') ?></td>
                                        <td><?= $row->tanggal ?></td>
                                        <td>
                                            <a href="<?= base_url('kaskeluar/edit/' . $row->idkaskeluar) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('kaskeluar/delete/' . $row->idkaskeluar) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
</main>
