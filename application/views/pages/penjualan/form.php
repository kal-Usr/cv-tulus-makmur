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
                        <label for="nama" class="mb-2">Nama</label>
                        <input type="text" name="nama" class="form-control mb-2" id="nama" value="<?= $input->nama ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="mb-2">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control mb-2" id="tanggal" value="<?= $input->tanggal ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="mb-2">Detail</label>
                        <textarea name="detail" class="form-control mb-2" id="detail"><?= $input->detail ?? '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="total" class="mb-2">Total</label>
                        <input type="number" name="total" class="form-control mb-2" id="total" value="<?= $input->total ?? '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
