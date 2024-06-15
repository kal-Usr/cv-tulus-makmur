<main role="main" class="container mt-4">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header bg-success text-light">
                    Detail Checkout #<?= $order->invoice ?>
                    <div class="float-right">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>
                <div class="card-body">
                    <p>Tanggal: <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                    <p>Nama: <?= $order->name ?> </p>
                    <p>Telepon: <?= $order->phone ?></p>
                    <p>Alamat: <?= $order->address ?></p>

                    <div class="table-responsive">
                        <table class="table">
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
                                            <p>
                                                <a href="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.png') ?>" data-toggle="lightbox" data-gallery="gallery">
                                                    <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.png') ?>" alt="" height="50">
                                                </a>
                                                <strong><?= $row->title ?></strong>
                                            </p>
                                        </td>
                                        <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        <td class="text-center"><?= $row->qty ?></td>
                                        <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                    </tr>
                                <?php endforeach ?>

                                <tr>
                                    <td colspan="3"><strong>Total:</strong></td>
                                    <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php if ($order->status == 'waiting') : ?>
                    <div class="card-footer">
                        <a href="<?= base_url("myorder/confirm/$order->invoice") ?>" class="btn btn-primary">Konfirmasi Pembayaran</a>
                    </div>
                <?php endif ?>
            </div>

            <?php if (isset($order_confirm)) : ?>
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-light">
                                Bukti Transfer
                            </div>
                            <div class="card-body">
                                <p>No Rekening: <?= $order_confirm->account_number ?></p>
                                <p>Atas Nama: <?= $order_confirm->account_name ?></p>
                                <p>Nominal: Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                <p>Catatan: <?= $order_confirm->note ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <a href="<?= base_url("/assets/images/confirm/$order_confirm->image") ?>" data-toggle="lightbox" data-gallery="gallery">
                            <img src="<?= base_url("/assets/images/confirm/$order_confirm->image") ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</main>
