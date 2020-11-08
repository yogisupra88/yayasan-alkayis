<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    @media all {
        .page-break {
            display: none;
        }
    }

    @media print {
        .page-break {
            display: block;
            page-break-before: always;
        }
    }

    table.table-bordered>thead>tr>th {
        border: 2px solid black;
    }
    </style>

    <title>Print Laporan Keuangan</title>
</head>

<body onload="print()">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Laporan Keuangan</h3>
                <h4 class="text-center"> Yayasan Alkayis</h4>
                <p class="text-center">( Periode : <?= $periode; ?> )</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead ">
                            <tr>
                                <th scope=" col">Post Name</th>
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
                                <td>Kotak Kaca</td>
                                <td>Rp.<?= number_format($kotak_kaca, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Kotak Kayu</td>
                                <td>Rp.<?= number_format($kotak_kayu, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Infaq</td>
                                <td>Rp.<?= number_format($infaq, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Penjualan Majalah</td>
                                <td>Rp.<?= number_format($majalah, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Ota Khusus</td>
                                <td>Rp.<?= number_format($ota_khusus, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Ota Umum</td>
                                <td>Rp.<?= number_format($ota_umum, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>CSR Perusahaan</td>
                                <td>Rp.<?= number_format($csr, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Proposal Qurban</td>
                                <td>Rp.<?= number_format($qurban, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Anak Yatim</td>
                                <td>Rp.<?= number_format($anak_yatim, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Pembangunan Pondok</td>
                                <td>Rp.<?= number_format($zakat, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Zakat</td>
                                <td>Rp.<?= number_format($zakat, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Sumbangan Lain</td>
                                <td>Rp.<?= number_format($sumbangan, 0, ",", "."); ?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class="text-danger">Pengeluaran</th>
                            </tr>
                            <tr>
                                <td>Setoran Yayasan</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($setoran_yayasan, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Mukafaah PPQ</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($mukafaah, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Santunan Anak Yatim</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($santunan, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Setoran Ota Khusus</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($setoran_ota_k, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Setoran Ota Umum</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($setoran_ota_u, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Setoran CSR</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($setoran_csr, 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Biaya Pembangunan</td>
                                <td>-</td>
                                <td class="text-danger">Rp.<?= number_format($biaya_bangunan, 0, ",", "."); ?></td>
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
                            <tr class="bg-light" style="border: 2px solid black;">
                                <td>Saldo Akhir </td>
                                <td colspan="2">Rp.<?= number_format($saldo_akhir, 0, ",", "."); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>