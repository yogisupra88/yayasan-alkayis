        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 text-right mb-2">
                Tanggal : <?= date("d M Y"); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-th-large"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total kotak</span>
                        <span class="info-box-number">
                            <?= $kotak; ?>
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
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dana Terkumpul Hari ini</span>
                        <span class="info-box-number">Rp.<?= number_format($dana, 0, ",", "."); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- menu  -->
        <div class="row">
            <div class="col-3 mx-auto text-center mt-2">
                <a href="<?= base_url('mydashboard/scaning_form') ?>">
                    <img src="<?= base_url('assets/') ?>icon/qr-code.png" width="48">
                    <div class="font-sm mt-1">
                        Scanning
                    </div>
                </a>
            </div>
            <div class="col-3 mx-auto text-center mt-2">
                <a href="<?= base_url('kotak/manual_form') ?>">
                    <img src="<?= base_url('assets/') ?>icon/data.png" width="48">
                    <div class="font-sm mt-1">
                        Input Manual
                    </div>
                </a>
            </div>
            <div class="col-3 mx-auto text-center mt-2">
                <a href="<?= base_url('auth/logout') ?>">
                    <img src="<?= base_url('assets/') ?>icon/arrow.png" width="48">
                    <div class="font-sm mt-1">
                        Logout
                    </div>
                </a>
            </div>
        </div>
        <!-- end menu -->