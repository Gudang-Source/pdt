<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="username">UKE II</label>
                        <input type="text" class="form-control" id="uke2" value="<?php echo $uke->uke_2_name ?>" disabled="disable">
                    </div>
                    <div class="form-group">
                        <label for="username">UKE III</label>
                        <input type="text" class="form-control" id="uke3" value="<?php echo $uke->uke_3_name ?>" disabled="disable">
                    </div>
                    <div class="form-group">
                        <label for="username">UKE IV</label>
                        <input type="text" class="form-control" id="uke4" value="<?php echo $uke->uke_4_name ?>" disabled="disable">
                    </div>
                    <div class="form-group">
                        <label for="username">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nama Pengaju" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="username">No. Tlp/Handphone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="No Telepon/Handphone Pengaju" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Upload File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="letter_file" id="file" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('letter') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>