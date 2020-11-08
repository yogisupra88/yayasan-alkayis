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
    <div class="col-12 col-md-5">
        <?php
        echo $this->session->flashdata('pesan');
        ?>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <div class="panel panel-danger  text-center">
            <div>
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
            <div class="panel-footer">
                <select></select>
                <hr>
                <a href="<?= base_url('mydashboard/beranda_petugas') ?>" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/webcam/'); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url('assets/webcam/'); ?>js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url('assets/webcam/'); ?>js/webcodecamjquery.js"></script>
<script type="text/javascript">
var arg = {
    resultFunction: function(result) {
        //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
        // $.post("../cek.php", { noijazah: result.code} );
        var redirect = '<?= base_url('kotak/input_dana') ?>';
        $.redirectPost(redirect, {
            kode_kotak: result.code
        });
    }
};

var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
decoder.buildSelectMenu("select");
decoder.play();
/*  Without visible select menu
    decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
*/
$('select').on('change', function() {
    decoder.stop().play();
});

// jquery extend function
$.extend({
    redirectPost: function(location, args) {
        var form = '';
        $.each(args, function(key, value) {
            form += '<input type="hidden" name="' + key + '" value="' + value + '">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body')
            .submit();
    }
});
</script>