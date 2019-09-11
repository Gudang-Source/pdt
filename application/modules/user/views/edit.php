<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $user->username ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="fullname">Nama Bagian <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama Bagian" autocomplete="off" value="<?php echo $user->user_fullname ?>" required>
                    </div>
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
                        <label for="">Deskripsi</label>
                        <textarea name="desc" id="desc" class="form-control" placeholder="Deskripsi"><?php echo $user->user_desc ?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-1">
                        <label>Status <span class="text-danger">*</span></label><br>
                        <label><input type="radio" name="status" value="1" <?php echo ($user->user_status) ? 'checked' : '' ?>> Aktif</label>
                        <label class="ml-2"><input type="radio" name="status" value="0" <?php echo (!$user->user_status) ? 'checked' : '' ?>> Non Aktif</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('user') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

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
    });
</script>