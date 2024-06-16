<main role="main" class="container mt-4">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-2" >
            <div class="card shadow">
                <div class="card-header bg-primary text-light text-center">
                    <h4 class="mb-0">Formulir Registrasi</h4>
                </div>
                <div class="card-body">
                    <?= form_open('register', ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="name" class="mb-2">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control mb-2', 'placeholder' => 'Masukkan Nama Anda', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-2">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control mb-2', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="mb-2">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control mb-2', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="mb-2">Konfirmasi Password</label>
                        <?= form_password('password_confirmation', '', ['class' => 'form-control mb-2', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                        <?= form_error('password_confirmation') ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
