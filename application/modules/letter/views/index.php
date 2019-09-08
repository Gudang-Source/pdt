<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('letter/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pengajuan</th>
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
                                <td><?php echo $row->letter_no ?></td>
                                <td>
                                    <a href="<?php echo site_url('letter/detail/' . $row->letter_id) ?>" class="btn btn-info btn-xs mb-1"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="3" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>