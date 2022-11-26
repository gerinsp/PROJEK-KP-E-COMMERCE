<main class="container">
    <?php $this->load->view('layouts/_alert') ?>
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
                    <?= form_open('login/email_reset_password_validation') ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Masukan E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $this->input->post('email'), 'class' => 'form-control bg-light', 'placeholder' => 'example@gmail.com', 'required' => true]) ?>
                    </div>
                    <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" name="">Submit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>