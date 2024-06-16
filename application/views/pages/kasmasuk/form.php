<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    <span>Formulir Kas Masuk</span>
                </div>
                <div class="card-body">
<?php if(isset($input->idkasmasuk)): ?>
    <?= form_open('kasmasuk/edit/' . $input->idkasmasuk) ?>
<?php else: ?>
    <?= form_open('kasmasuk/create') ?>
<?php endif; ?>
                    <?= form_hidden('idkasmasuk', $input->idkasmasuk ?? '') ?>
                    <div class="form-group">
                        <label for="keterangan" class="mb-2">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control mb-2" id="keterangan" placeholder="Masukkan keterangan" value="<?= $input->keterangan ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uangmasuk" class="mb-2">Uang Masuk</label>
                        <input type="number" name="uangmasuk" class="form-control mb-2" id="uangmasuk" placeholder="Masukkan jumlah uang masuk" value="<?= $input->uangmasuk ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="mb-2">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control mb-2" id="tanggal" value="<?= $input->tanggal ?? '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
