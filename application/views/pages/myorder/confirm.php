<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-success text-light">
                    Konfirmasi Pembayaran #<?= $order->invoice ?>
                    <div class="float-right">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>

                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= form_hidden('id_orders', $order->id); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no-transaksi" class="mb-2">No Transaksi</label>
                                <input type="text" class="form-control mb-2" value="<?= $order->invoice ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="dari-rekening" class="mb-2">Dari Rekening a/n</label>
                                <input type="text" name="account_name" value="<?= $input->account_name ?>" class="form-control mb-2" />
                                <?= form_error('account_name') ?>
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="mb-2">Nominal</label>
                                <input type="number" name="nominal" value="<?= $input->nominal ?>" class="form-control mb-2" />
                                <?= form_error('nominal') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no-rekening" class="mb-2">No Rekening</label>
                                <input type="text" name="account_number" value="<?= $input->account_number ?>" class="form-control mb-2" />
                                <?= form_error('account_number') ?>
                            </div>
                            <div class="form-group">
                                <label for="catatan" class="mb-2">Catatan</label>
                                <textarea name="note" id="catatan" cols="30" rows="5" class="form-control mb-2">-</textarea>
                            </div>
                            <div class="form-group">
                                <label for="bukti-transfer" class="mb-2">Bukti Transfer</label><br />
                                <input type="file" name="image" id="bukti-transfer" />
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Konfirmasi Pembayaran
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
