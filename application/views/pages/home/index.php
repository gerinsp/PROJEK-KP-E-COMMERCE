<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
            <rect width="100%" height="100%" fill="#777" />
            </svg>

            <!-- <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                </div>
            </div> -->
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
            <!-- <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                </div>
            </div> -->
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
            <!-- <div class="container">
                <div class="carousel-caption text-end">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                </div>
            </div> -->
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<main class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 ">
                        <div class="card-body">
                            Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                            <span class="float-end">
                                Urutkan Harga: <a href="<?= base_url("/shop/sortby/asc") ?>" class="nav-link badge bg-primary">Termurah</a> | <a href="<?= base_url("/shop/sortby/desc") ?>" class="nav-link badge bg-primary">Termahal</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($content as $row) : ?>
                    <div class="col-md-4">
                        <div class="card mb-3" style="height: 42rem;">
                            <img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>" class="card-img-top" alt="" width="">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row->product_title ?></h5>
                                <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</strong></p>
                                <p class="card-text"><?= $row->description ?></p>
                                <a href="<?= base_url("/shop/category/$row->category_slug") ?>" class="badge bg-primary nav-link"><i class="fas fa-tags"> </i><?= $row->category_title ?></a>
                            </div>
                            <div class="card-footer">
                                <form action="<?= base_url("/cart/add") ?>" method="POST">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <nav aria-label="Page navigation example">
                <?= $pagination ?>
            </nav>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 ">
                        <div class="card-header">
                            <strong>Pencarian</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url("/shop/search") ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" value="<?= $this->session->userdata('keyword') ?>" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Kategori</strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a class="nav-link active text-dark" href="<?= base_url('/') ?>">Semua Kategori</a></li>
                            <?php foreach (getCategories() as $category) : ?>
                                <li class="list-group-item"><a class="nav-link active text-dark" href="<?= base_url("/shop/category/$category->slug") ?>"><?= $category->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>