<div class="container-fluid">
  <div class="card-box">
    <button type="button" class="btn btn-primary btn-xs mb-2 btnAdd" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
    </h4>

    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($type)) {
            $i = $jlhpage + 1;
            foreach ($type as $row) :
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row->type_name ?></td>
                <td><?php echo ($row->type_status) ? 'Aktif' : 'Tidak Aktif' ?></td>
                <td>
                  <a href="#" class="btn btn-info btn-xs btnEdit mb-1" data-toggle="modal" data-target="#add" data-id="<?php echo $row->type_id ?>" data-name="<?php echo $row->type_name ?>" data-status="<?php echo $row->type_status ?>"><i class="fas fa-edit"></i> Ubah</a>
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

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titleModal">Tambah <?php echo $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form id="form" action="<?php echo site_url('type/add') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="_id">
          <div class="form-group">
            <label for="">Jenis</label>
            <input type="text" name="type_name" class="form-control" id="type_name" required="">
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select name="type_status" id="type_status" class="form-control">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function() {

    $('.btnAdd').on('click', function() {
      $('#titleModal').html('Tambah <?php echo $title ?>');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#form').attr('action', '<?php echo site_url('type/add') ?>');
      $('#type_name').val('');
      $('#_id').val('');

    })

    $('.btnEdit').on('click', function() {
      var id = $(this).data('id');
      var type = $(this).attr('data-name');
      var status = $(this).attr('data-status');
      $('#titleModal').html('Ubah <?php echo $title ?>');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('#form').attr('action', '<?php echo site_url('type/edit') ?>');
      $('#type_name').val(type);
      $('#type_status').val(status);
      $('#_id').val(id);
    })


  });
</script>