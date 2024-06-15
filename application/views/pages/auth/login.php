<main role="main" class="container mt-5">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row justify-content-center ">
        <div class="col-md-6 mt-2">
            <div class="card shadow">
                <div class="card-header bg-primary text-light text-center">
                    <h4 class="mb-0">Silahkan Login Dahulu</h4>
                </div>
                <div class="card-body">
                    <?= form_open('login', ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </
