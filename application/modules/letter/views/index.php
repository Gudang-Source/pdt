<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('letter/add') ?>" class="btn btn-danger btn-sm mb-2 float-right"><i class="fa fa-plus"></i> Tambah</a>
        <?php echo form_open(current_url(), array('method' => 'get')) ?>
        <div class="row">
            <?php if ($this->role_id == 1) : ?>
                <div class="col">
                    <div class="form-group">
                        <select name="uke2" id="uke_2_id" class="form-control form-control-sm">
                            <option value="">--- UKE II ---</option>
                            <?php foreach ($uke2 as $row) : ?>
                                <option value="<?php echo $row->uke_2_id ?>"><?php echo $row->uke_2_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select name="uke3" id="uke_3_id" class="form-control form-control-sm">
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select name="uke4" id="uke_4_id" class="form-control form-control-sm">
                        </select>
                    </div>
                </div>
            <?php endif ?>
            <div class="col">
                <div class="form-group">
                    <select name="status" id="" class="form-control form-control-sm">
                        <option value="">--- Semua Status ---</option>
                        <option value="0">Diajukan</option>
                        <option value="1">Disetujui</option>
                        <option value="2">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-filter"></i> Filter</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>UKE II</th>
                        <th>UKE III</th>
                        <th>UKE IV</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($letter)) {
                        $i = $jlhpage + 1;
                        foreach ($letter as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->uke_2_name ?></td>
                                <td><?php echo $row->uke_3_name ?></td>
                                <td><?php echo $row->uke_4_name ?></td>
                                <td>
                                    <span class="badge badge-<?php echo ($row->letter_status == 1) ? 'success' : (($row->letter_status == 0) ? 'warning' : 'danger') ?>">
                                        <?php echo ($row->letter_status == 1) ? 'Disetujui' : (($row->letter_status == 0) ? 'Diajukan' : 'Ditolak')  ?>
                                        <?php if ($row->letter_code == 1) : ?>
                                            <?php echo 'Bagian Hukum' ?>
                                        <?php elseif ($row->letter_code == 2) : ?>
                                            <?php echo 'Sesditjen' ?>
                                        <?php elseif ($row->letter_code == 3) : ?>
                                            <?php echo 'KPA' ?>
                                        <?php elseif ($row->letter_code == 4) : ?>
                                            <?php echo 'Dirjen' ?>
                                        <?php endif ?>
                                    </span>
                                </td>
                                <td><?php echo $row->letter_note ?></td>
                                <td>
                                    <a href="<?php echo site_url('letter/detail/' . $row->letter_id) ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="7" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
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