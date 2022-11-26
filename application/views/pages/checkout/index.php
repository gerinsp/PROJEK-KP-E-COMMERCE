<main class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header">
                    Formulir Alamat Pengiriman
                </div>
                <div class="card-body">
                    <form action="<?= base_url("/checkout/create") ?>" method="POST">

                        <div class="mb-3">
                            <label for="" class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-control"></select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kota/Kabupaten</label>
                            <select name="kota" class="form-control"></select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Expedisi</label>
                            <select name="expedisi" class="form-control"></select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Paket</label>
                            <select name="paket" class="form-control"></select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="<?= $input->name ?>">
                            <?= form_error('name') ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat Lengkap</label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control"><?= $input->address ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="mb-3">

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value="<?= $input->phone ?>">
                            <?= form_error('phone') ?>
                        </div>
                        <input name="total_bayar" hidden>
                        <input name="ongkir" hidden>
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cart
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $tot_berat = 0;
                                    foreach ($cart as $row) :
                                        $berat = $row->qty * $row->berat;
                                        $tot_berat = $tot_berat + $berat; ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->qty ?></td>
                                            <td><?= $tot_berat ?> Gr</td>
                                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td></td>
                                            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>

                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td>Ongkir</td>
                                        <td></td>
                                        <td></td>
                                        <td><label id="ongkir"></label></td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"><strong>Total</strong> </td>
                                        <td></td>
                                        <td><strong><label id="total_bayar"></label></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    //masukkan data ke selec provinsi
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url('rajaongkir/provinsi') ?>",
                                        success: function(hasil_provinsi) {
                                            console.log(hasil_provinsi);
                                            $("select[name=provinsi]").html(hasil_provinsi);
                                        }
                                    });

                                    //masukkan data ke selec kota
                                    $("select[name=provinsi]").on("change", function() {
                                        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                                        $.ajax({
                                            type: "POST",
                                            url: "<?= base_url('rajaongkir/kota') ?>",
                                            data: 'id_provinsi=' + id_provinsi_terpilih,
                                            success: function(hasil_kota) {
                                                $("select[name=kota]").html(hasil_kota);
                                            }
                                        });
                                    });

                                    $("select[name=kota]").on("change", function() {
                                        $.ajax({
                                            type: "POST",
                                            url: "<?= base_url('rajaongkir/expedisi') ?>",
                                            success: function(hasil_expedisi) {
                                                $("select[name=expedisi]").html(hasil_expedisi);
                                            }
                                        });
                                    });

                                    //mendapatkan data paket
                                    $("select[name=expedisi]").on("change", function() {
                                        //mendapatkan expedisi terpilih
                                        var expedisi_terpilih = $("select[name=expedisi]").val()
                                        // mendapatkan id kota tujuan terpilih
                                        var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
                                        //mengambil data ongkos kirim
                                        var total_berat = <?= $tot_berat ?>;

                                        $.ajax({
                                            type: "POST",
                                            url: "<?= base_url('rajaongkir/paket') ?>",
                                            data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                                            success: function(hasil_paket) {
                                                $("select[name=paket]").html(hasil_paket);
                                            }
                                        });
                                    });

                                    $("select[name=paket]").on("change", function() {
                                        //menampilkan ongkir
                                        var dataongkir = $("option:selected", this).attr('ongkir');
                                        var reverse = dataongkir.toString().split('').reverse().join(''),
                                            ribuan_ongkir = reverse.match(/\d{1,3}/g);
                                        ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');

                                        $("#ongkir").html("Rp" + ribuan_ongkir + ",-")

                                        //menghitung totol Bayar
                                        var data_total_bayar = parseInt(dataongkir) + parseInt(<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '') ?>);
                                        var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
                                            ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
                                        ribuan_total_bayar = ribuan_total_bayar.join('.').split('').reverse().join('');
                                        $("#total_bayar").html("Rp" + ribuan_total_bayar + ",-");

                                        $("input[name=total_bayar]").val(data_total_bayar);
                                        $("input[name=ongkir]").val(dataongkir);
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>