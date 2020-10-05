<div class="row">
    <div class="col-12 text-center">
        <h3 class="text-danger ">Data Input Dana Kotak Amal</h3>
        <p> Tanggal : <?= date("d M Y"); ?></p>
    </div>
    <div class="col-12 col-md-5">
        <?php
        echo $this->session->flashdata('pesan');
        ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>kotak</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_kotak as $row) {

                    ?>
                    <tr>
                        <td><?= $row['kode_kotak']; ?></td>
                        <td>Rp.<?= number_format($row['debet'], 0, ",", "."); ?></td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#modal_edit_data"
                                data-kode="<?= $row['kode_kotak']; ?>" data-id="<?= $row['id']; ?>"
                                data-jumlah="<?= $row['debet']; ?>" data-donatur="<?= $row['donatur']; ?>"
                                id="tombol_ubah" class="btn btn-info btn-sm mt-2"> <i
                                    class="fa fa-pencil-square-o mr-2"></i>Edit
                            </a>
                            <a href="<?= base_url('transaksi/hapus_transaksi/') ?><?= encrypt_url($row['id']) ?>"
                                class="btn btn-danger btn-sm mt-2"
                                onclick="return confirm('Anda yakin mau menghapus Data ini ?')">
                                <i class="fa fa-times mr-2"></i>Hapus </a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Input </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/edit_dana_kotak') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="">Kode Kotak</label>
                        <input type="text" class="form-control" id="edit_kode2" aria-describedby="helpId" value=""
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Donatur</label>
                        <input type="text" class="form-control" id="edit_donatur" aria-describedby="helpId" value=""
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control" name="dana" data-type="currency" id="edit_dana"
                            aria-describedby="helpId" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// Untuk sunting
$(document).on('click', '#tombol_ubah', function() {
    var id = $(this).data('id');
    var kode = $(this).data('kode');
    var jumlah = $(this).data('jumlah');
    var donatur = $(this).data('donatur');
    $('#edit_id').val(id);
    $('#edit_kode2').val(kode);
    $('#edit_dana').val(jumlah);
    $('#edit_donatur').val(donatur);
});
</script>