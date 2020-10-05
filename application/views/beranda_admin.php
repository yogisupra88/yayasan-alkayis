        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-th-large"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total kotak</span>
                        <span class="info-box-number">
                            <?= $total_kotak; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Income bulan ini</span>
                        <span class="info-box-number">Rp.<?= number_format($income, 0, ",", "."); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-credit-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Saldo Kas</span>
                        <span class="info-box-number">Rp.<?= number_format($saldo_kas, 0, ",", "."); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Petugas</span>
                        <span class="info-box-number"><?= $total_petugas; ?></span>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12 mt-2">
                <h4 class="text-primary" style="margin-bottom:-5px;">Pendapatan ( Hari Ini )</h4>
                <table id="example2" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>tanggal</th>
                            <th>Uraian</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_income as $row) { ?>
                        <tr>
                            <td><?= date("d M Y", strtotime($row['tanggal'])); ?></td>
                            <td><?= $row['post']; ?></td>
                            <td><?= number_format($row['debet'], 0, ",", "."); ?></td>
                        </tr>
                        <?php } ?>
                </table>

            </div>
        </div>