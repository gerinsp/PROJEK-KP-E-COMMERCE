<header>
    <nav class="navbar navbar-expand-md navbar-white fixed-top no-print">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>"><img width="45" src="<?= base_url('/') ?>assets/images/ghelm.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color:white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">
                            Home
                        </a>
                    </li>
                    <?php if ($this->session->userdata('role') == 'admin') : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Manage
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light " aria-labelledby="navbarDarkDropdownMenuLink">
                                <a href="<?= base_url('category') ?>" class="dropdown-item">Kategori</a>
                                <a href="<?= base_url('product') ?>" class="dropdown-item">Produk</a>
                                <a href="<?= base_url('order') ?>" class="dropdown-item">Order</a>
                                <a href="<?= base_url('user') ?>" class="dropdown-item">Pengguna</a>
                                <a href="<?= base_url('report') ?>" class="dropdown-item">Laporan Penjualan</a>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"> </i>
                            Cart
                            (<?= getCart(); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex" action="<?= base_url("/shop/search") ?>" method="POST">
                            <div class="input-group">
                                <input id="panel" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius:20px; border-top-right-radius:20px;" class="input  form-control border-0 bg-light" placeholder="search.." name="keyword" value="<?= $this->session->userdata('keyword') ?>">
                                <div id="panel2" class="input-group-append">
                                    <button type="submit" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px;" class="btn btn-white text-white"></button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a id="flip" href="#" class="nav-link"><i class="fas fa-search"></i></i>
                        </a>
                    </li>
                    <?php if (!$this->session->userdata('is_login')) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('login') ?>" class="nav-link">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('register') ?>" class="nav-link">
                                Register
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <?= $this->session->userdata('name') ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                <a href="<?= base_url('profile') ?>" class="dropdown-item">Profile</a>
                                <a href="<?= base_url('myorder') ?>" class="dropdown-item">Orders</a>
                                <a href="<?= base_url('logout') ?>" class="dropdown-item text-danger">Logout</a>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>