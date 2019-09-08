<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="bg-picture card-box">
        <div class="profile-info-name text-center">
          <img src="<?php echo media_url() ?>/images/default.jpeg"
          class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
          <h4><?php echo ucfirst($this->fullname) ?></h4>
          <a href="#" data-toggle="modal" data-target="#cpw" class="btn btn-danger btn-sm"><i class="fa fa-lock"></i> Ganti Password</a>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card-box">
        <h3>Profil Saya</h3>
        <div class="profile-info-detail overflow-hidden">
          <form action="<?php echo site_url('profile/edit') ?>" method="post" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $this->uid ?>">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" value="<?php echo $user->username ?>" readonly="">
            </div>
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" name="fullname" class="form-control" value="<?php echo $user->user_fullname ?>">
            </div>
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="cpw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form action="<?php echo site_url('profile/cpw') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $this->uid ?>">
          <div class="form-group">
            <label for="">Password Baru</label>
            <input type="password" name="new_password" class="form-control" placeholder="Masukan Password Lama" required="">
          </div>
          <div class="form-group">
            <label for="">Konfirmasi Password Baru</label>
            <input type="password" name="conf_password" class="form-control" placeholder="Masukan Password Lama" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect waves-light">Ganti Password</button>
        </div>
      </form>
      </div>
    </div>
  </div>