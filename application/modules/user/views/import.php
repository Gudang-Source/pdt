<div class="container-fluid">
    <div class="card-box">
        <div class="p-3">
            <h4>Petunjuk Singkat</h4>
            <p>Penginputan data Menu/Item bisa dilakukan dengan mengcopy data dari file Ms. Excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a href="<?php echo site_url('merchant/item/download'); ?>"><span class="badge badge-success">Disini</span></a></p>
            <hr>

            <form action="<?php echo current_url() ?>" method="post">
                <div class="form-group">
                    <textarea placeholder="Copy data yang akan dimasukan dari file excel, dan paste disini" rows="8" class="form-control" name="rows"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-flat">Import</button>
                    <a href="<?php echo site_url('user') ?>" class="btn btn-info btn-sm btn-flat">Kembali</a>
                </div>
            </form>
        </div>

    </div>