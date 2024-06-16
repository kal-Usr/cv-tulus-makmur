<main role="main" class="container mt-4">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row mt-4">
        <div class="col-md-10 mx-auto">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-light d-flex justify-content-between align-items-center">
                            <span>Detail Order #<?= $order->invoice ?></span>
                            <div>
                                <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><strong>Tanggal:</strong> <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                            <p><strong>Nama:</strong> <?= $order->name ?></p>
                            <p><strong>Telepon:</strong> <?= $order->phone ?></p>
                            <p><strong>Alamat:</strong> <?= $order->address ?></p>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order_detail as $row) : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.png') ?>" alt="" height="50" class="me-2">
                                                        <strong><?= $row->title ?></strong>
                                                    </div>
                                                </td>
                                                <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                                <td class="text-center"><?= $row->qty ?></td>
                                                <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                            <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url("order/update/$order->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $order->id ?>">
                                <div class="input-group">
                                    <select name="status" class="form-select">
                                        <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                                        <option value="paid" <?= $order->status == 'paid' ? 'selected' : '' ?>>Dibayar</option>
                                        <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>Dikirim</option>
                                        <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : '' ?>>Batal</option>
                                    </select>
                                    <button class="btn btn-primary ms-2" type="submit">Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($order_confirm)) : ?>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-warning text-light">
                                Bukti Transfer
                            </div>
                            <div class="card-body">
                                <p><strong>No Rekening:</strong> <?= $order_confirm->account_number ?></p>
                                <p><strong>Atas Nama:</strong> <?= $order_confirm->account_name ?></p>
                                <p><strong>Nominal:</strong> Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                <p><strong>Catatan:</strong> <?= $order_confirm->note ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url("/assets/images/confirm/$order_confirm->image") ?>" alt="" class="img-fluid rounded shadow-sm">
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</main>
