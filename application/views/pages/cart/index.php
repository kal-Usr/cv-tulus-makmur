<main role="main" class="container mt-4">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    Keranjang Belanja
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                                <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.png') ?>" alt="" height="50" style="margin-right: 10px;">
                                                <strong><?= $row->title ?></strong>
                                            </div>
                                        </td>
                                        <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        <td>
                                            <form action="<?= base_url("/cart/update/$row->id") ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                                <div class="input-group">
                                                    <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="submit"><i class="fas fa-check"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                        <td>
                                            <form action="<?= base_url("/cart/delete/$row->id") ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="3"><strong>Total: </strong></td>
                                    <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              <div class="card-footer d-flex justify-content-between">
                  <a href="<?= base_url('/') ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left me-2"></i> Kembali Belanja</a>
                  <a href="<?= base_url('/checkout') ?>" class="btn btn-success">Checkout <i class="fas fa-angle-right ms-2"></i></a>
</div>

            </div>
        </div>
    </div>
</main>
