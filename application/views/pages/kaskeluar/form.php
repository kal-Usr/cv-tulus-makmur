<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    <span>Formulir Kas Keluar</span>
                </div>
                <div class="card-body">
<?php if(isset($input->idkaskeluar)): ?>
    <?= form_open('kaskeluar/edit/' . $input->idkaskeluar) ?>
<?php else: ?>
    <?= form_open('kaskeluar/create') ?>
<?php endif; ?>
                    <?= isset($input->idkaskeluar) ? form_hidden('idkaskeluar', $input->idkaskeluar) : '' ?>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan keterangan" value="<?= isset($input->keterangan) ? $input->keterangan : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uangkeluar">Uang Keluar</label>
                        <input type="number" name="uangkeluar" class="form-control" id="uangkeluar" placeholder="Masukkan jumlah uang keluar" value="<?= isset($input->uangkeluar) ? $input->uangkeluar : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= isset($input->tanggal) ? $input->tanggal : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
