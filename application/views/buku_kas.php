<div class="row">
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Saldo Kas</span>
                <span class="info-box-number">Rp.<?= number_format($saldo_kas, 0, ",", "."); ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Income bulan ini</span>
                <span class="info-box-number">Rp.<?= number_format($income, 0, ",", "."); ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-upload"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengeluaran bulan ini</span>
                <span class="info-box-number">Rp.<?= number_format($pengeluaran, 0, ",", "."); ?></span>
            </div>
        </div>
    </div>

    <div class="clearfix hidden-md-up"></div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-12 col-md-5">
        <?php
        echo $this->session->flashdata('pesan');
        ?>
    </div>

    <div class="col-12">
        <div class="card-body">
            <button class="btn btn-info" data-toggle="modal" data-target="#pemasukan" data-toggle="modal"><i
                    class="fa fa-plus mr-2" aria-hidden="true"> </i> Pemasukan</button>
            <button class="btn btn-danger" data-toggle="modal" data-target="#pengeluaran" data-toggle="modal">
                <i class="fa fa-minus mr-2" aria-hidden="true"></i> Pengeluaran</button>

            <table id="example2" class="table table-bordered ">

                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>trx</th>
                        <th>Uraian</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kas as $row) {

                    ?>
                    <tr>
                        <td><?= date("d M Y", strtotime($row['tanggal'])); ?></td>
                        <td><?= $row['kode_trx']; ?></td>
                        <td><?= $row['post']; ?></td>
                        <td><?= number_format($row['debet'], 0, ",", "."); ?></td>
                        <td><?= number_format($row['kredit'], 0, ",", "."); ?></td>
                        <td>
                            <a href="<?= base_url('mydashboard/edit_form_kas/') ?><?= encrypt_url($row['id']); ?>"
                                class="btn btn-info"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="<?= base_url('transaksi/hapus_kas') ?>/<?= encrypt_url($row['id']); ?>/<?= encrypt_url($row['kode_trx']); ?>"
                                onclick="return confirm('Apakah Anda yakin Akan Menghapus nya?');"
                                class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>

</div>
<!-- Modal pemasukan-->
<div class="modal fade" id="pemasukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=" document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>
                    Input Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/input_kas') ?>" method="post">
                <input type="hidden" name="transaksi" value="pemasukan">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-select">Katagori Pemasukan</label>
                        <select id="my-select" class="form-control" name="kategori">
                            <option value="infaq">Infaq</option>
                            <option value="zakat">Zakat</option>
                            <option value="sumbangan">Sumbangan Donatur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal </label>
                        <input type="text" class="form-control" name="nominal" aria-describedby="helpId"
                            id="currency-field" data-type="currency">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <input type="text" class="form-control" name="uraian" id="" aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal pengeluaran-->
<div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=" document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>
                    Input Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/input_kas') ?>" method="post">
                <input type="hidden" name="transaksi" value="pengeluaran">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-select">Katagori Pengeluaran</label>
                        <select id="my-select" class="form-control" name="kategori">
                            <option value="operational">Biaya Operational</option>
                            <option value="listrik">Biaya Listrik / Air</option>
                            <option value="pemeliharaan">Biaya Pemeliharaan</option>
                            <option value="peralatan">Beli Peralatan</option>
                            <option value="lain">Biaya Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal </label>
                        <input type="text" class="form-control" name="nominal" aria-describedby="helpId"
                            id="currency-field" data-type="currency">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <input type="text" class="form-control" name="uraian" id="" aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>