<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('rule/add') ?>" class="btn btn-primary btn-sm mb-2 float-right"><i class="fa fa-plus"></i> Tambah</a>
        <?php echo form_open(current_url(), array('method' => 'get')) ?>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <select name="uke_2" id="uke_2_id" class="form-control form-control-sm">
                        <option value="">--- UKE II ---</option>
                        <?php foreach ($uke2 as $row) : ?>
                            <option value="<?php echo $row->uke_2_id ?>"><?php echo $row->uke_2_name ?></option>
                        <?php endforeach; ?>
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
                        <th>Nomor Peraturan</th>
                        <th>Tahun Peraturan</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($rule)) {
                        $i = $jlhpage + 1;
                        foreach ($rule as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->uke_2_name ?></td>
                                <td><?php echo $row->rule_no ?></td>
                                <td><?php echo $row->rule_year ?></td>
                                <td><span class="badge badge-<?php echo ($row->rule_status) ? 'success' : 'warning' ?>"><?php echo ($row->rule_status) ? 'Publish' : 'Draft' ?></span></td>
                                <td>
                                    <a href="<?php echo site_url('rule/edit/' . $row->rule_id) ?>" class="btn btn-success btn-xs"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?php echo site_url('rule/detail/' . $row->rule_id) ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Detail</a>

                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>