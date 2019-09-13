<div class="container-fluid">
    <div class="card-box">
        <div class="table-respinsive">
            <table class="table table-striped table-hover">
                <tr>
                    <td>Unit Kerja</td>
                    <td>:</td>
                    <td><?php echo $rule->uke_2_name; ?></td>
                </tr>
                <tr>
                    <td>Jenis SK</td>
                    <td>:</td>
                    <td><?php echo $rule->type_name; ?></td>
                </tr>
                <tr>
                    <td>Nomor Peraturan</td>
                    <td>:</td>
                    <td><?php echo $rule->rule_no; ?></td>
                </tr>
                <tr>
                    <td>Tahun Peraturan</td>
                    <td>:</td>
                    <td><?php echo $rule->rule_year; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Penetapan</td>
                    <td>:</td>
                    <td><?php echo pretty_date($rule->rule_date, 'd F Y', false); ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo ($rule->rule_status) ? 'Publish' : 'Draft'; ?></td>
                </tr>
                <?php if (isset($rule->rule_file)) : ?>
                    <tr>
                        <td>Dokumen</td>
                        <td>:</td>
                        <td><a href="<?php echo upload_url('publish/' . $rule->rule_file) ?>" class="text-danger" target="_blank"><i class="mdi mdi-file-pdf"></i> <?php echo $rule->rule_file; ?></a></td>
                    </tr>
                <?php endif ?>
            </table>
            <a href="<?php echo site_url('home') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>