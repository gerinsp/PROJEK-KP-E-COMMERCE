<main class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    Detail Order #<?= $order->invoice ?>
                    <div class="float-end">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>

                <div class="card-body">
                    <h5>No Resi : <?= $order->no_resi ?></h5>
                    <br>
                    <p>Tanggal: <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                    <p>Nama: <?= $order->name ?></p>
                    <p>Telepon: <?= $order->phone ?></p>
                    <p>Alamat: <?= $order->address ?></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-center">Sub Total</th>
                                <th scope="col" class="text-center">Ongkir</th>
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
                <div class="card-footer">
                    <form action="<?= base_url("order/update/$order->id") ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $order->id ?>">
                        <div class="input-group">
                            <select name="status" id="" class="form-control">
                                <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                                <option value="verify" <?= $order->status == 'verify' ? 'selected' : '' ?>>Verifikasi Pembayaran</option>
                                <option value="paid" <?= $order->status == 'paid' ? 'selected' : '' ?>>Dibayar</option>
                                <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>Dikirim</option>
                                <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : '' ?>>Batal</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
            <?php if (isset($order_confirm)) : ?>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Bukti Transfer
                            </div>
                            <form action="<?= base_url("order/updateResi/$order->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $order->id ?>">
                                <div class="card-body">
                                    <p>No Rekening: <?= $order_confirm->account_number ?></p>
                                    <p>Atas Nama: <?= $order_confirm->account_name ?></p>
                                    <p>Nominal: Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                    <p>Catatan: <?= $order_confirm->note ?></p>
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" name="no_resi" class="form-control" placeholder="Masukkan No Resi"></input>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" width="230">
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</main>