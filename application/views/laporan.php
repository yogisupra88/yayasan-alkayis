<div class="row">
    <div class="col-12 col-md-8">
        <div class="card bg-info">
            <div class="card-body">
                <h5>Range Tanggal</h5>
                <form action="<?= base_url('mydashboard/laporan_keuangan') ?>" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Dari tanggal</label>
                                <input type="date" class="form-control" name="fromdate" value="<?= date("Y-m-01") ?>"
                                    id="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Sampai tanggal</label>
                                <input type="date" class="form-control" name="enddate" value="<?= date("Y-m-d") ?>"
                                    id="" aria-describedby=" helpId">
                            </div>
                        </div>
                        <div class="col-12 col-md-4" style="margin-top:10px;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger mt-4">Proses Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h3 class="text-center text-primary">Laporan Keuangan</h3>
        <p class="text-center">( Periode : <?= $periode; ?> )</p>
        <a href="<?= base_url('mydashboard/print_laporan') ?>/<?= $from_tgl ?>/<?= $end_tgl ?>" target="_blank"
            class="btn btn-success mb-2">
            <i class="fa fa-print" aria-hidden="true"></i> Print Laporan
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">Post Name</th>
                        <th scope="col">Debet</th>
                        <th scope="col">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Saldo Awal</td>
                        <td>Rp.<?= number_format($saldo_last, 0, ",", "."); ?></td>
                        <td>-</td>
                    </tr>

                    <tr>
                        <th class="text-primary">Pendapatan</th>
                    </tr>
                    <tr>
                        <td>Kotak Amal</td>
                        <td>Rp.<?= number_format($kotak_amal, 0, ",", "."); ?></td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Infaq</td>
                        <td>Rp.<?= number_format($infaq, 0, ",", "."); ?></td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Zakat</td>
                        <td>Rp.<?= number_format($zakat, 0, ",", "."); ?></td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Sumbangan</td>
                        <td>Rp.<?= number_format($sumbangan, 0, ",", "."); ?></td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th class="text-danger">Pengeluaran</th>
                    </tr>
                    <tr>
                        <td>Biaya Operasional</td>
                        <td>-</td>
                        <td class="text-danger">Rp.<?= number_format($operasional, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>Biaya Listrik & Air</td>
                        <td>-</td>
                        <td class="text-danger">Rp.<?= number_format($listrik, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>Biaya pemeliharaan</td>
                        <td>-</td>
                        <td class="text-danger">Rp.<?= number_format($pemeliharaan, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>Pembelian Peralatan</td>
                        <td>-</td>
                        <td class="text-danger">Rp.<?= number_format($peralatan, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>Biaya Lain Lain</td>
                        <td>-</td>
                        <td class=" text-danger">Rp.<?= number_format($lain, 0, ",", "."); ?></td>
                    </tr>
                    <tr style="border: 2px solid black;">
                        <td>total</td>
                        <td>Rp.<?= number_format($debet, 0, ",", "."); ?></td>
                        <td class="text-danger">Rp.<?= number_format($kredit, 0, ",", "."); ?></td>
                    </tr>
                    <tr class="bg-dark" style="border: 2px solid black;">
                        <td>Saldo Akhir </td>
                        <td colspan="2">Rp.<?= number_format($saldo_akhir, 0, ",", "."); ?></td>
                    </tr>



                </tbody>
            </table>
        </div>

    </div>
</div>