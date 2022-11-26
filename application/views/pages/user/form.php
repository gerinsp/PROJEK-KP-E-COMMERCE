<main class="container">
    <div class="row">
        <div class="col-md-10 mt-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Tambah Pengguna</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Role</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Member</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="
                                    " class="form-label">Status</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 1 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 0, 'checked' => $input->is_active == 0 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Photo
                        </label>
                        <br>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <?= form_close() ?>
                </div>
            </div>

        </div>
    </div>
</main>