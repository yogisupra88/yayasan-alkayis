<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number"><?= $total_petugas; ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Administrator</span>
                <span class="info-box-number"><?= $total_admin; ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input_user">
            <i class="fa fa-plus mr-2"></i> tambah User
        </button>
        <div class="col-12 col-md-8 mt-2">
            <?php
            echo $this->session->flashdata('pesan');
            ?>
        </div>

        <table id="example2" class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No Handphone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($user as $row) { ?>
                <tr>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jabatan']; ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td>
                        <a href="<?= base_url('mydashboard/ubah_user') ?>/<?= encrypt_url($row['id_user']); ?>" class="btn btn-info">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <?php if ($row['jabatan'] == 'Petugas') { ?>
                        <a href="<?= base_url('mydashboard/delete_user') ?>/<?= encrypt_url($row['id_user']); ?>/<?= encrypt_url($row['username']); ?>" onclick="return confirm('Apakah Anda yakin Akan User ini ?');" class="btn btn-danger">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
        </table>

    </div>
</div>
<!-- modal input data -->
<div class="modal fade" id="input_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-user" aria-hidden="true"></i> Tambah User Baru
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('mydashboard/tambah_user') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId"
                            placeholder="Isi Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="" aria-describedby="helpId"
                            placeholder="Isi No Ponsel / HP" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <!-- radio -->
                        <label for="">Pilih Jabatan</label>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="jabatan" value="Admin" checked>
                                <label for="radioPrimary1"> <span class="text-danger">Admin</span>
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="jabatan" value="Petugas">
                                <label for="radioPrimary2"> <span class="text-primary">Petugas</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" id="" aria-describedby="helpId"
                            placeholder="Isi Username Untuk Login" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                            placeholder="Password untuk Login" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

