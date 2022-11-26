<main class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <?php
    $reset_key = $this->uri->segment(3);
    ?>
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <div class="card">
                <!-- <div class="card-header">
                    Login
                </div> -->
                <div class="card-body">
                    <h1 class="h4 mb-3 fw-normal">Reset Password</h1>
                    <br>
                    <?= validation_errors() ?>
                    <?= form_open('login/reset_password_validation') ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Token</label>
                        <?= form_input(['type' => 'text', 'name' => 'reset_key', 'class' => 'form-control bg-light', 'required' => true], set_value('reset_key', $reset_key)) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <?= form_password('password', '', ['value' => $this->input->post('[password]'), 'class' => 'form-control bg-light', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Konfirmasi Password</label>
                        <?= form_password('password_confirmation', '', ['value' => $this->input->post('password_confirmation'), 'class' => 'form-control bg-light', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                    </div>
                    <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" name="">Reset Password</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>