<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-light">
                    <span>Formulir Pengguna</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">Nama</label>
                                <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                                <?= form_error('name') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">E-Mail</label>
                                <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                                <?= form_error('email') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="mb-2">Password</label>
                                <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="role" class="mb-2">Role</label><br>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Customer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'role', 'value' => 'pemilik', 'checked' => $input->role == 'pemilik' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Pemilik</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="is_active" class="mb- mt-2">Status</label><br>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'is_active', 'value' => '1', 'checked' => $input->is_active == '1' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'is_active', 'value' => '0', 'checked' => $input->is_active == '0' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Tidak Aktif</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="mb-2">Foto</label>
                                <?= form_upload('image', '', ['class' => 'form-control mb-2']) ?>
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                                <?php if (isset($input->image)) : ?>
                                    <img src="<?= base_url("/assets/images/user/$input->image") ?>" alt="" class="img-thumbnail mt-2" height="150">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .card {
        transition: box-shadow 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
