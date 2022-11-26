<main class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-3 mt-4">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body">
                    <img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/avatar.png") ?>" alt="" height="200">
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <p>Nama: <?= $content->name ?></p>
                    <p>E-Mail: <?= $content->email ?></p>
                    <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>

</main>