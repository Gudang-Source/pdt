<?php

if (isset($rule)) {
    $id = $rule->rule_id;
    $no = $rule->rule_no;
    $about = $rule->rule_about;
    $year = $rule->rule_year;
    $date = $rule->rule_date;
    $status = $rule->rule_status;
    $uke = $rule->uke_2_id;
} else {
    $no = set_value('rule_no');
    $about = set_value('rule_about');
    $year = set_value('rule_year');
    $date = set_value('rule_date');
    $status = set_value('rule_status');
    $uke = set_value('uke_2_id');
}
?>
<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="">Instansi <span class="text-danger">*</span></label>
                        <select id="uke_2_id" name="uke_2_id" class="form-control">
                            <option value="">--- Pilih Instansi ---</option>
                            <?php foreach ($uke2 as $row) : ?>
                                <option value="<?php echo $row->uke_2_id ?>" <?php echo ($uke == $row->uke_2_id) ? 'selected' : '' ?>><?php echo $row->uke_2_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Peraturan <span class="text-danger">*</span></label>
                        <input type="text" name="rule_no" class="form-control" id="rule_no" placeholder="Nomor Peraturan" autocomplete="off" value="<?php echo $no ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Tentang <span class="text-danger">*</span></label>
                        <textarea name="rule_about" id="" class="form-control" placeholder="Tentang"><?php echo $about ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tahun Peraturan <span class="text-danger">*</span></label>
                                <input type="text" name="rule_year" class="form-control years" value="<?php echo $year ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tanggal Ditetapkan <span class="text-danger">*</span></label>
                                <input type="text" name="rule_date" value="<?php echo $date ?>" class="form-control datepicker" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Upload File <span class="text-danger">*</span></label><br>
                        <?php if (isset($rule)) : ?>
                            <span class="text-danger"><a href="<?php echo upload_url('publish/'. $rule->rule_file) ?>" class="text-danger" target="_blank"><i class="mdi mdi-file-pdf"></i><?php echo $rule->rule_file ?> </a></span>
                        <?php endif ?>
                        <input type="file" class="form-control" name="rule_file" id="file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-1">
                        <label>Status <span class="text-danger">*</span></label><br>
                        <label><input type="radio" name="rule_status" value="1" <?php echo ($status) ? 'checked' : '' ?>> Publish</label>
                        <label class="ml-2"><input type="radio" name="rule_status" value="0" <?php echo (!$status) ? 'checked' : '' ?>> Draft</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('rule') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>