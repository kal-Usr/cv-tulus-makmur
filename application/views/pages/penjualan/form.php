<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    <span>Formulir Penjualan</span>
                </div>
                <div class="card-body">
                    <?= form_open($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->idpenjualan) ? form_hidden('idpenjualan', $input->idpenjualan) : '' ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $input->nama ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $input->tanggal ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea name="detail" class="form-control" id="detail"><?= $input->detail ?? '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" name="total" class="form-control" id="total" value="<?= $input->total ?? '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
