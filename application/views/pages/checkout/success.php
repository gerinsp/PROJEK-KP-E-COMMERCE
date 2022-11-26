<main class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div>
                <div class="card-body">
                    <h5>Nomer Order: <?= $content->invoice ?></h5>
                    <p>Terima kasih, sudah berbelanja.</p>
                    <p>Silahkan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara:</p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BCA 320916756</strong> a/n Toko Ginajar Helm
                        </li>
                        <li>Sertakan keterangan dengan nomor order: <strong><?= $content->invoice ?></strong></li>
                        <li>Total pembayaran: <strong>Rp<?= number_format($content->total, 0, ',', '.') ?>,-</strong></li>
                        <li>Lakukan transfer dengan nominal yang sesuai dengan total diatas.</li>
                        <li>Selanjutnya kami akan melakukan Verifikasi pembayaran.</li>
                        <li>Jika berhasil maka statusnya akan berubah menjadi "dibayar", Namun jika nominalnya kurang atau tidak sesuai, Maka statusnya akan dirubah menjadi "Melakukan Pembayaraan".</li>
                        <li>Kemudian, silahkan anda lakukan konfirmasi pembayaran lagi sesuai kekurangannya.</li>
                    </ol>
                    <p>Jika sudah, silahkan kirim bukti transfer di halaman konfirmasi atau bisa <a href="<?= base_url("/myorder/detail/$content->invoice") ?>">klik disini</a>!</p>
                    <a href="<?= base_url('/') ?>" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left">
                        </i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>