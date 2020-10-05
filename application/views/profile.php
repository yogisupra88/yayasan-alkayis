  <div class="row">
      <div class="col-12 col-md-6 mx-auto mt-2">
          <?php
            echo $this->session->flashdata('pesan');
            ?>
      </div>
  </div>
  <div class="row">
      <div class="col-12 col-md-6 mx-auto">
          <div class="card">
              <div class="card-header bg-info">
                  <h3 class="text-center"> <i class="fa fa-user-circle" aria-hidden="true"></i> MY PROFILE</h3>
              </div>
              <form action="<?= base_url('mydashboard/ubah_profile') ?>" method="post">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" class="form-control" aria-describedby="helpId" value="<?= $username ?>"
                              disabled>
                      </div>
                      <div class="form-group">
                          <label for="">Jabatan</label>
                          <input type="text" class="form-control" aria-describedby="helpId" value="<?= $jabatan ?>"
                              disabled>
                      </div>

                      <div class="form-group">
                          <label for="">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" aria-describedby="helpId"
                              value="<?= $nama ?>">
                      </div>
                      <div class="form-group">
                          <label for="">No Hp</label>
                          <input type="text" class="form-control" name="no_hp" aria-describedby="helpId"
                              value="<?= $no_hp ?>">
                      </div>
                      <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control" name="password" aria-describedby="helpId"
                              value="<?= $password ?>">
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-info float-right"> <i class="fa fa-save mr-1"></i>
                          Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>