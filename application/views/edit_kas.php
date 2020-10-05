<div class="row">
    <div class="col-12 col-md-6 mx-auto bg-info">
        <?php $transaksi = ($kas->debet > 0) ? 'pemasukan' : 'pengeluaran'; ?>
        <h4 class="mb-3 mt-2 text-center text-capitalize">Edit Data <?= $transaksi; ?></h4>
        <form action="<?= base_url('transaksi/ubah_kas') ?>" method="post">
            <input type="hidden" name="transaksi" value="<?= $transaksi; ?>">
            <input type="hidden" name="id_kas" value="<?= $kas->id; ?>">
            <input type="hidden" name="trx" value="<?= $kas->kode_trx ?>">
            <div class="form-group">
                <label for="">No TRX</label>
                <input type="text" class="form-control" id="" aria-describedby="helpId" value="<?= $kas->kode_trx ?>"
                    disabled>
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="" aria-describedby="helpId"
                    value="<?= $kas->tanggal ?>">
            </div>
            <?php if ($transaksi == 'pemasukan') { ?>
            <div class="form-group">
                <label for="my-select">Katagori Pemasukan</label>
                <select id="my-select" class="form-control" name="kategori">
                    <option value="<?= $kode_post ?>" selected><?= $post; ?> ( Default )</option>
                    <option value="1">Kotak Amal</option>
                    <option value="2">Infaq</option>
                    <option value="3">Zakat</option>
                    <option value="4">Sumbangan Donatur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nominal</label>
                <input type="text" class="form-control" name="nominal" id="currency-field" data-type="currency"
                    aria-describedby="helpId" value="<?= $kas->debet ?>">
            </div>
            <?php } elseif ($transaksi == 'pengeluaran') { ?>
            <div class="form-group">
                <label for="my-select">Katagori Pemasukan</label>
                <select id="my-select" class="form-control" name="kategori">
                    <option value="<?= $kode_post ?>" selected><?= $post; ?> ( Default )</option>
                    <option value="1">Kotak Amal</option>
                    <option value="2">Infaq</option>
                    <option value="3">Zakat</option>
                    <option value="4">Sumbangan Donatur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Nominal</label>
                <input type="text" class="form-control" name="nominal" id="currency-field" data-type="currency"
                    aria-describedby="helpId" value="<?= $kas->kredit ?>">
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="">uraian</label>
                <textarea class="form-control" name="uraian" id="" rows="3"><?= $kas->uraian; ?></textarea>
            </div>

            <div class="form-group">
                <a href="<?= base_url('mydashboard/buku_kas') ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>