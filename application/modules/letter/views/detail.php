<div class="container-fluid">
    <div class="card-box">
        <div class="table-respinsive">
            <table class="table table-hover">
                <tr>
                    <td>UKE II</td>
                    <td>:</td>
                    <td><?php echo $letter->uke_2_name; ?></td>
                </tr>
                <tr>
                    <td>UKE III</td>
                    <td>:</td>
                    <td><?php echo $letter->uke_3_name; ?></td>
                </tr>
                <tr>
                    <td>UKE IV</td>
                    <td>:</td>
                    <td><?php echo $letter->uke_4_name; ?></td>
                </tr>
                <tr>
                    <td>Nomor Pengajuan</td>
                    <td>:</td>
                    <td><?php echo $letter->letter_no; ?></td>
                </tr>
                <tr>
                    <td>Nama Pengaju</td>
                    <td>:</td>
                    <td><?php echo $letter->letter_fullname; ?></td>
                </tr>
                <tr>
                    <td>No Tlp/Handphone Pengaju</td>
                    <td>:</td>
                    <td><?php echo $letter->letter_phone; ?></td>
                </tr>
                <tr>
                    <td>Status Pengajuan</td>
                    <td>:</td>
                    <td><?php echo ($letter->letter_status == 1) ? 'Disetujui' : (($letter->letter_status == 2) ? 'Ditolak' : 'Diajukan'); ?></td>
                </tr>
                <?php if (isset($letter->letter_file)) : ?>
                    <tr>
                        <td>File Dokumen</td>
                        <td>:</td>
                        <td><a href="<?php echo upload_url('submit/' . $letter->letter_file) ?>" class="btn btn-success btn-xs" target="_blank"><i class="mdi mdi-briefcase-download"></i> Download</a></td>
                    </tr>
                <?php endif ?>
            </table>
            <a href="<?php echo site_url('letter') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
            <?php if ($letter->letter_status == 0) : ?>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#approval"><i class="fa fa-list"></i> Opsi</button>
            <?php endif ?>
        </div>
    </div>
</div>

<div id="approval" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Persetujuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="letter_id" value="<?php echo $letter->letter_id ?>" id="_id">
                    <div class="form-group">
                        <select name="status" class="status form-control">
                            <option value="">---Pilih Persetujuan---</option>
                            <option value="1">Setuju</option>
                            <option value="2">Tolak</option>
                        </select>
                    </div>
                    <div id="koreksi" style="display:none">
                        <div class="form-group">
                            <label for="">Koreksi</label><br>
                            <label><input type="radio" value="1" name="cek" class="cek"> Ya</label>
                            <label><input type="radio" value="0" name="cek" class="cek ml-2"> Tidak</label>
                        </div>
                    </div>
                    <div id="upload" style="display:none">
                        <div class="form-group">
                            <label for="">Upload File <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="letter_file" id="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.status').change(function() {
        if (this.value == 1) {
            $('#koreksi').show();
        } else {
            $('#koreksi').hide();
        }
    })
    $('.cek').on('input', function() {
        if (this.value == 1) {
            $('#upload').show();
        } else {
            $('#upload').hide();
        }
    });
</script>