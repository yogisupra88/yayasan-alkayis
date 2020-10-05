<div class="row">
    <div class="col-12 col-md-7 mx-auto mt-3">
        <h4 class="text-info text-center">Input Data Kotak Amal</h4>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('transaksi/manual_kotak') ?>" method="post">
                    <div class="form-group">
                        <label for="my-select">Kode Kotak / Donatur</label>
                        <select id="my-select" class="form-control" name="kode_kotak">
                            <?php
                            foreach ($kotak as $row) {   ?>
                            <option value="<?= $row['kode_kotak']; ?>"><?= $row['kode_kotak']; ?> |
                                <?= $row['nama_donatur']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dana Terkumpul</label>
                        <input type="text" class="form-control" name="dana" id="currency-field" data-type="currency"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Input Data</button>
                        <a href="<?= base_url('mydashboard/beranda_petugas') ?>"
                            class="btn btn-danger float-right">Batalkan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>