<main class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <div class="card">
                <!-- <div class="card-header">
                    Login
                </div> -->
                <div class="card-body">
                    <h1 class="h4 mb-3 fw-normal">Silahkan Login</h1>
                    <br>
                    <?= form_open('login', ['method' => 'POST']) ?>
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control bg-light', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control bg-light', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <a href="<?= site_url('login/reset_password_email') ?>">lupa password?</a>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>