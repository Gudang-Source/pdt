<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <?php if ($this->role_id == 1) : ?>
                        <div class="form-group">
                            <label for="">UKE II <span class="text-danger">*</span></label>
                            <select id="uke_2_id" class="form-control">
                                <option value="">--- Pilih UKE II ---</option>
                                <?php foreach ($uke2 as $row) : ?>
                                    <option value="<?php echo $row->uke_2_id ?>"><?php echo $row->uke_2_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">UKE III <span class="text-danger">*</span></label>
                            <select id="uke_3_id" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">UKE IV <span class="text-danger">*</span></label>
                            <select id="uke_4_id" name="uke_4_id" class="form-control">
                            </select>
                        </div>
                    <?php else : ?>
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
                            <input type="text" name="uke_4_id" lass="form-control" id="uke4" value="<?php echo $uke->uke_4_name ?>" disabled="disable">
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="">Jenis Surat <span class="text-danger">*</span></label>
                        <select id="type_id" name="type_id" class="form-control">
                            <option value="">--- Pilih Jenis Surat ---</option>
                            <?php foreach ($type as $row) : ?>
                                <option value="<?php echo $row->type_id ?>"><?php echo $row->type_name ?></option>
                            <?php endforeach; ?>
                        </select>
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

<?php if ($this->role_id == 1) : ?>
    <script>
        $(document).ready(function() {
            $("#uke_2_id").change(function() {
                var uke_2_id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "<?php echo site_url('user/getUke3') ?>",
                    data: "uke_2_id=" + uke_2_id,
                    success: function(msg) {
                        if (msg == '') {
                            $("select#uke_3_id").html('<option value="">--Pilih UKE III--</option>');
                        } else {
                            $("select#uke_3_id").html(msg);
                        }
                    }
                });
            });
            $("#uke_3_id").change(function() {
                var uke_3_id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "<?php echo site_url('user/getUke4') ?>",
                    data: "uke_3_id=" + uke_3_id,
                    success: function(msg) {
                        if (msg == '') {
                            $("select#uke_4_id").html('<option value="">--Pilih UKE IV--</option>');
                        } else {
                            $("select#uke_4_id").html(msg);
                        }
                    }
                });
            });
        });
    </script>
<?php endif ?>