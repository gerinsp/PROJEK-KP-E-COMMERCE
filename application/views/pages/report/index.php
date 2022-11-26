<main class="container">
    <div class="row">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    Laporan Harian
                </div>
                <div class="card-body">
                    <?= form_open('report/perday') ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Tanggal</label>
                                <select name="tanggal" class="form-control">
                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Bulan</label>
                                <select name="bulan" class="form-control">

                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <div class="form-group d-grid gap-2">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    Laporan Tahunan
                </div>
                <div class="card-body">
                    <?= form_open('report/peryears') ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <div class="form-group d-grid gap-2">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    Laporan Bulanan
                </div>
                <div class="card-body">
                    <?= form_open('report/permonth') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Bulan</label>
                                <select name="bulan" class="form-control">

                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group-sm">
                                <label for="" class="form-label">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group d-grid gap-2">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <? form_close();?>
                </div>
            </div>
        </div>

    </div>
</main>