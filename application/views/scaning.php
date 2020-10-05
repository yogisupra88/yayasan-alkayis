<style type="text/css">
.scanner-laser {
    position: absolute;
    margin: 40px;
    height: 30px;
    width: 30px;
}

.laser-leftTop {
    top: 0;
    left: 0;
    border-top: solid red 5px;
    border-left: solid red 5px;
}

.laser-leftBottom {
    bottom: 0;
    left: 0;
    border-bottom: solid red 5px;
    border-left: solid red 5px;
}

.laser-rightTop {
    top: 0;
    right: 0;
    border-top: solid red 5px;
    border-right: solid red 5px;
}

.laser-rightBottom {
    bottom: 0;
    right: 0;
    border-bottom: solid red 5px;
    border-right: solid red 5px;
}
</style>
<div class="row">
    <div class="col-12 col-md-5 mx-auto">
        <?php
        echo $this->session->flashdata('pesan');
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4 mx-auto">
        <div class="panel panel-danger">
            <div class="text-center">
                <h8 class="text-danger bold">Arahkan Camera pada QR code</h8> <br>
            </div>
            <div class="panel-body text-center">
                <div style="position: relative;display: inline-block;">
                    <canvas id="qr-canvas" width="200" height="200"></canvas>
                    <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                </div>
                <hr>
            </div>
            <div class="panel-footer text-center">
                <select></select>
                <hr>
                <a href="<?= base_url('mydashboard/beranda_petugas') ?>" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>