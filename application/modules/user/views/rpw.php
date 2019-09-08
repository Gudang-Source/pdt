<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>

                    <div class="form-group">
                        <label for="password">Password Baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password baru" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Masukan Konfirmasi Password" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('user') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>