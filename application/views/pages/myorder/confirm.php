<main class="container">
    <div class="row">
        <div class="col-md-3 mt-4">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9 mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    Konfirmasi Order #<?= $order->invoice ?>
                    <div class="float-end">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= form_hidden('id_orders', $order->id); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Transaksi</label>
                            <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                        </div>
                        <div class=" mb-3">
                            <label for="" class="form-label">Dari Rekening a/n</label>
                            <input type="text" name="account_name" class="form-control" value="<?= $input->account_name ?>">
                            <?= form_error('account_name') ?>
                        </div>
                        <div class=" mb-3">
                            <label for="" class="form-label">No Rekening</label>
                            <input type="text" name="account_number" value="<?= $input->account_number ?>" class="form-control">
                            <?= form_error('account_number') ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sebesar</label>
                            <input type="number" name="nominal" value="<?= $input->nominal ?>" class="form-control">
                            <?= form_error('nominal') ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Catatan</label>
                            <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Bukti Transfer</label>
                            <input type="file" name="image" id="">
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

</main>