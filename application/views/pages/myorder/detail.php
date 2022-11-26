<main class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-3 mt-4">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9 mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    Detail Order # <?= $order->invoice ?>
                    <div class="float-end">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>

                <div class="card-body">
                    <h5>No Resi : <?= $order->no_resi ?></h5>
                    <br>
                    <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                    <p>Nama : <?= $order->name ?></p>
                    <p>Telepon : <?= $order->phone ?></p>
                    <p>Alamat : <?= $order->address ?></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-center">Sub Total</th>
                                <th scope="col" class="text-center">Ongkir</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_detail as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url('/images/product/default.png') ?>" alt="" width="50"> <strong><?= $row->title ?></strong>
                                    </td>
                                    <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                    <td class="text-center">
                                        <?= $row->qty ?>
                                    </td>
                                    <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                    <td class="text-center">Rp<?= number_format($row->ongkir, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td></td>
                                <td class="text-center"><strong>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php if ($order->status == 'waiting') : ?>
                    <div class="card-footer">

                        <a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                    </div>
                <?php endif ?>
            </div>
            <?php if (isset($order_confirm)) : ?>
                <div class="card mb-3">
                    <div class="col-md-12">
                        <div class="card-header">
                            Ulasan Produk
                        </div>
                        <div class="col-md-8" style="float: left;">
                            <div class="card-body">
                                <i class="fas fa-user-circle fa-2x"></i> <?= $this->session->userdata('name') ?>
                                <br><br>
                                <h5><?= $order_confirm->title ?></h5>
                                <p><?= $order_confirm->comment ?></p>
                            </div>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <div class="card-body">
                                <img src="<?= base_url("/images/confirm/$order_confirm->gambar") ?>" alt="" height="200">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($order->status == 'accepted') : ?>
                <div class="card mb-3">
                    <form action="<?= base_url("myorder/posting/$order->invoice") ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $order->id ?>">
                        <div class="card-body">
                            <div class=" mb-3">
                                <input type="text" name="title" class="form-control" value="" placeholder="Judul">
                                <?= form_error('title') ?>
                            </div>
                            <div class="mb-3">
                                <textarea name="comment" id="" cols="10" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Foto Barang</label>
                                <input type="file" name="gambar" id="">
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Komentar</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <?php if (isset($order_confirm)) : ?>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Bukti Transfer
                            </div>
                            <form action="<?= base_url("myorder/update/$order->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $order->id ?>">
                                <div class="card-body">
                                    <p>No Rekening: <?= $order_confirm->account_number ?></p>
                                    <p>Atas Nama: <?= $order_confirm->account_name ?></p>
                                    <p>Nominal: Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                    <p>Catatan: <?= $order_confirm->note ?></p>

                                    <?php if ($order->status == 'delivered') : ?>
                                        <button name="status" class="btn btn-primary" type="submit" value="accepted" <?= $order->status == 'accepted' ?> onclick="return confirm('Apakah barang sudah sampai?')">Pesanan Diterima</button>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" height="200">
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

</main>