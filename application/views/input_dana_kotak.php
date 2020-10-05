<div class="row">
    <div class="col-12 o mt-3">
        <h4 class="text-info text-center">Input Data Kotak Amal</h4>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('transaksi/kotak_amal') ?>" method="post">
                    <input type="hidden" name="kode_kotak" value="<?=$kode_kotak; ?>">
                    <input type="hidden" name="donatur" value="<?=$donatur; ?>">
                    <div class="form-group">
                      <label for="">Kode</label>
                      <input type="text"
                        class="form-control" value="<?=$kode_kotak; ?>" id="" aria-describedby="helpId" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Toko / Donatur</label>
                      <input type="text"
                        class="form-control" value="<?=$donatur; ?>" id="" aria-describedby="helpId"disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Dana Terkumpul</label>
                      <input type="text" class="form-control" name="dana" id="currency-field"  data-type="currency" required autofocus>                    
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Input Data</button>
                        <a href="<?= base_url('mydashboard/beranda_petugas') ?>" class="btn btn-danger float-right" >Batalkan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
