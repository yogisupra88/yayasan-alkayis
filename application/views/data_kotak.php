<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">kotak Kaca</span>
                <span class="info-box-number">
                    <?= $kotak_kaca; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">kotak Kayu</span>
                <span class="info-box-number">
                    <?= $kotak_kayu; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-th-large"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total kotak</span>
                <span class="info-box-number">
                    <?= $total_kotak; ?>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6 mt-2">
        <?php
        echo $this->session->flashdata('pesan');
        ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-success" data-toggle="modal" data-target="#newkotak"><i class="fa fa-plus"
                aria-hidden="true"> </i> Tambah Kotak Amal</button>
        <a href="<?= base_url('kotak/print_all') ?>" class="btn btn-warning btn-sm float-right" target="_blank"><i
                class="fa fa-print mr-2"></i>
            print_all</a>
        <div class="card-body">
            <table id="example1" class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Kode Kotak</th>
                        <th>Tipe Kotak</th>
                        <th>Donatur</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kotak as $row) {

                    ?>
                    <tr>
                        <td>
                            <?= $row['kode_kotak']; ?>
                        </td>
                        <td><?= $row['tipe']; ?></td>
                        <td><?= $row['nama_donatur']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['kontak']; ?></td>
                        <td>
                            <a href="<?= base_url('kotak/print_kotak/') ?><?= encrypt_url($row['id_kotak']); ?>"
                                class=" btn btn-info btn-sm mt-1" target="_blank">
                                <i class="fa fa-print mr-1" aria-hidden="true"></i>
                            </a>
                            <button id="edit_kotak" class="btn btn-success btn-sm mt-1" data-toggle="modal"
                                data-target="#editkotak" data-id="<?= $row['id_kotak'] ?>"
                                data-kode="<?= $row['kode_kotak'] ?>" data-donatur="<?= $row['nama_donatur'] ?>"
                                data-alamat="<?= $row['alamat'] ?>" data-tipe="<?= $row['tipe'] ?>">
                                <i class="fa fa-pencil mr-1" aria-hidden="true"></i>
                            </button>
                            <a href="<?= base_url('kotak_amal/hapus_kotak/') ?><?= encrypt_url($row['id_kotak']); ?>"
                                class="btn btn-danger btn-sm mt-1"><i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</div>
<script>
$('#data_kotak').DataTable();
</script>

</div>
<!-- Modal Tambah Kotak-->
<div class="modal fade" id="newkotak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kotak Amal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kotak_amal/add_kotak') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-select">Jenis Kotak</label>
                        <select id="my-select" class="custom-select" name="tipe">
                            <option value="Kaca">Kaca</option>
                            <option value="Kayu">Kayu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Donatur</label>
                        <input type="text" class="form-control" name="donatur" id="" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Alamat</label>
                        <textarea id="my-textarea" class="form-control" name="alamat" rows="3"
                            placeholder="Alamat Donatur" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">No Kontak</label>
                        <input type="text" class="form-control" name="kontak" placeholder="No HP / Telepon"
                            aria-describedby="helpId" required>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kotak -->
<div class="modal fade" id="editkotak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kotak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kotak_amal/edit_kotak') ?>" method="post">
                <input type="hidden" name="id_kotak" value="" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode</label>
                        <input type="text" class="form-control" name="kode_kotak" id="edit_kode2" value=""
                            aria-describedby="helpId" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Donatur</label>
                        <input type="text" class="form-control" name="donatur" id="edit_donatur" value=""
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Alamat</label>
                        <textarea id="edit_alamat" class="form-control" name="alamat" rows="3" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Jenis Kotak</label>
                        <select id="my-select" class="custom-select" name="tipe">
                            <option id="edit_tipe"></option>
                            <option value="Kaca">Kaca</option>
                            <option value="kayu">kayu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// Untuk sunting
$(document).on('click', '#edit_kotak', function() {
    var id = $(this).data('id');
    var kode = $(this).data('kode');
    var donatur = $(this).data('donatur');
    var alamat = $(this).data('alamat');
    var tipe = $(this).data('tipe');

    $('#edit_id').val(id);
    $('#edit_kode2').val(kode);
    $('#edit_donatur').val(donatur);
    $('#edit_alamat').val(alamat);
    $('#edit_tipe').val(tipe);
    $('#edit_tipe').html(tipe);
});
</script>