<div class="container-fluid">
    <div class="card-box">
        <div class="table-respinsive">
            <table class="table table-hover">
                <tr>
                    <td>Jenis Surat</td>
                    <td>:</td>
                    <td><?php echo $letter->type_name; ?></td>
                </tr>
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
            <?php if ($this->role_id == 1) : ?>
                <?php if ($letter->letter_status != 2) : ?>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#approval"><i class="fa fa-list"></i> Opsi</button>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
    <div class="card-box">
        <h4 style="margin-top:-10px">Detail</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="thead-light text-center">
                    <tr>
                        <th rowspan="2">Tanggal Pengajuan</th>
                        <th colspan="2">Bagian Hukum</th>
                        <?php if ($letter->type_id == 2) : ?>
                            <th colspan="2">Sesditjen</th>
                        <?php else : ?>
                            <th colspan="2">KPA</th>
                        <?php endif ?>
                        <?php if ($letter->type_id == 2) : ?>
                            <th colspan="2">Dirjen</th>
                        <?php endif ?>
                        <th rowspan="2">Catatan</th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <?php if ($letter->type_id == 2) : ?>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <td><?php echo pretty_date($letter->letter_created_at, 'd F Y H:i', false); ?></td>
                    <td><?php echo ($letter->letter_hukum_date != null) ? pretty_date($letter->letter_hukum_date, 'd-m-Y H:i', false) : '-'; ?></td>
                    <td><?php echo ($letter->letter_hukum == 1) ? 'Disetujui' : (($letter->letter_hukum == 2) ? 'Ditolak' : '-'); ?></td>
                    <?php if ($letter->type_id == 2) : ?>
                        <td><?php echo ($letter->letter_sesditjen_date != null) ? pretty_date($letter->letter_sesditjen_date, 'd-m-Y H:i', false) : '-'; ?></td>
                        <td><?php echo ($letter->letter_sesditjen == 1) ? 'Disetujui' : (($letter->letter_sesditjen == 2) ? 'Ditolak' : '-'); ?></td>
                    <?php else : ?>
                        <td><?php echo ($letter->letter_kpa_date != null) ? pretty_date($letter->letter_kpa_date, 'd-m-Y H:i', false) : '-'; ?></td>
                        <td><?php echo ($letter->letter_kpa == 1) ? 'Disetujui' : (($letter->letter_kpa == 2) ? 'Ditolak' : '-'); ?></td>
                    <?php endif ?>

                    <?php if ($letter->type_id == 2) : ?>
                        <td><?php echo ($letter->letter_dirjen_date != null) ? pretty_date($letter->letter_dirjen_date, 'd-m-Y H:i', false) : '-'; ?></td>
                        <td><?php echo ($letter->letter_dirjen == 1) ? 'Disetujui' : (($letter->letter_dirjen == 2) ? 'Ditolak' : '-') ?></td>
                    <?php endif ?>
                    <td><?php echo $letter->letter_note; ?></td>
                </tbody>
            </table>
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
                    <?php if ($letter->letter_hukum == 0) : ?>
                        <div class="form-group">
                            <label for="">Bagian Hukum</label>
                            <select name="hukum" id="hukum" class="status form-control">
                                <option value="">---Pilih Persetujuan---</option>
                                <option value="1">Setuju</option>
                                <option value="2">Tolak</option>
                            </select>
                        </div>
                    <?php endif ?>
                    <?php if ($letter->letter_hukum == 1) : ?>
                        <?php if ($letter->type_id == 2) : ?>
                            <?php if ($letter->letter_sesditjen == 0) : ?>
                                <div class="form-group">
                                    <label for="">Sesditjen</label>
                                    <select name="sesditjen" id="sesditjen" class="status form-control">
                                        <option value="">---Pilih Persetujuan---</option>
                                        <option value="1">Setuju</option>
                                        <option value="2">Tolak</option>
                                    </select>
                                </div>
                            <?php endif ?>
                        <?php else : ?>
                            <?php if ($letter->letter_kpa == 0) : ?>
                                <div class="form-group">
                                    <label for="">KPA</label>
                                    <select name="kpa" id="kpa" class="status form-control">
                                        <option value="">---Pilih Persetujuan---</option>
                                        <option value="1">Setuju</option>
                                        <option value="2">Tolak</option>
                                    </select>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>

                    <?php if ($letter->letter_sesditjen == 1) : ?>
                        <?php if ($letter->letter_dirjen == 0) : ?>
                            <div class="form-group">
                                <label for="">Dirjen</label>
                                <select name="dirjen" id="dirjen" class="status form-control">
                                    <option value="">---Pilih Persetujuan---</option>
                                    <option value="1">Setuju</option>
                                    <option value="2">Tolak</option>
                                </select>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

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
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="note" id="note" class="form-control"></textarea>
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