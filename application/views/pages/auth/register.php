<main class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="h4 mb-3 fw-normal">Silahkan Registrasi</h1>
                    <br>
                    <?= form_open('register', ['method' => 'POST']) ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control bg-light', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control bg-light', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control bg-light', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Konfirmasi Password</label>
                        <?= form_password('password_confirmation', '', ['class' => 'form-control bg-light', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                        <?= form_error('password_confirmation') ?>
                    </div>
                    <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>

        </div>
    </div>
</main>