<form action="" method="get">
    <div class="form-group">
        <label for="uke_2">Pilih Kementrian</label>
        <select name="uke_2" id="uke_2" class="form-control">
            <option value="">-- Semua Kementrian --</option>
            <?php foreach ($uke2 as $row) : ?>
                <option value="<?php echo $row->uke_2_id ?>" <?php echo (isset($q['uke_2']) && $q['uke_2'] == $row->uke_2_id) ? 'selected' : '' ?>><?php echo $row->uke_2_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="about">Tentang</label>
        <input type="text" name="about" class="form-control" id="about" autocomplete="off" value="<?php echo isset($q['about']) ? $q['about'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="no">Nomor Peraturan</label>
        <input type="text" name="no" class="form-control" id="no" autocomplete="off" value="<?php echo isset($q['no']) ? $q['no'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="year">Tahun Peraturan</label>
        <input type="text" name="year" class="form-control years" id="year" autocomplete="off" value="<?php echo isset($q['year']) ? $q['year'] : '' ?>">
    </div>
    <button class="btn btn-danger btn-sm"><i class="fa fa-search"></i> Cari</button>
</form>