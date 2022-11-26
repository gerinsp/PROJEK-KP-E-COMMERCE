<main class="container">
    <div class="card mt-5">
        <div class="invoice p-3 mb-3">
            <div class="col-12">
                <div class="card-header bg-white text-dark">
                    <h5>
                        <i class="fas fa-shopping-cart"></i> Laporan Penjualan Harian
                        <small class="float-end fs-6">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
                    </h5>
                </div>
            </div>
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Order</th>
                                <th>Product</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $total = 0;
                            foreach ($report as $key => $value) { ?>
                                <?php $total = $total + $value->subtotal; ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->invoice ?></td>
                                    <td><?= $value->title ?></td>
                                    <td>Rp<?= number_format($value->price, 0, ',', '.') ?>,-</td>
                                    <td><?= $value->qty ?></td>
                                    <td>Rp<?= number_format($value->subtotal, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total :</strong></td>
                                <td></td>
                                <td><strong>Rp<?= number_format($total, 0, ',', '.') ?>,-</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="row no-print">
                <div class="col-12">
                    <button class="btn btn-light" onclick="window.print()"><i class="fas fa-print"></i> Print</button>

                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</main>