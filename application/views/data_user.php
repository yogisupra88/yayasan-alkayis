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
        <button class="btn btn-success"><i class="fa fa-plus mr-2" aria-hidden="true"></i> Tambah User</button>
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
                        <button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <?php if ($row['jabatan'] == 'Petugas') { ?>
                        <a href="http://" class="btn btn-danger">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
        </table>

    </div>
</div>