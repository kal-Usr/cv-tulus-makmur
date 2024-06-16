<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Formulir Profile
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group">
                        <label for="name" class="mb-2">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control mb-2', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-2">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control mb-2', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="mb-2">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control mb-2', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                        <?= form_error('password') ?>
                    </div>
                   
                    <div class="form-group">
                        <label for="image" class="mb-2">Foto</label>
                        <br>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger mb-2"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/assets/images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
