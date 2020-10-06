<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Ubah Data User</h4>
    </div>
    <div class="col-12 col-md-6">
        <form action="<?= base_url('mydashboard/update_user') ?>" method="POST">
        <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
        <input type="hidden" name="username" value="<?= $user->username; ?>">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text"
                class="form-control" value="<?= $user->username; ?>" aria-describedby="helpId" disabled>
                <small class="text-danger">Username tidak dapat diubah</small>
            </div>
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text"
                class="form-control" name="nama"  value="<?= $user->nama; ?>" id="" aria-describedby="helpId" >
            </div>
            <div class="form-group">
              <label for="">No Handphone</label>
              <input type="text"
                class="form-control" name="no_hp" value="<?= $user->no_hp; ?>" id="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="my-select">Jabatan</label>
                <select id="my-select" class="custom-select" name="jabatan">
                    <option value="<?= $user->jabatan ?>" selected><?= $user->jabatan ?> ( Default )</option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </div>
            <div class="form-group">
              <label for="">Password User</label>
              <input type="password"
                class="form-control" name="password" value="<?= $user->password ?>" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-danger">** Ubah input jika ingin merubah password baru</small>
            </div>
            <div class="form-group">
                <a href="<?= base_url('mydashboard/data_user') ?>" class="btn btn-danger">Batalkan</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>