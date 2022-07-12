<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_supplier" class="form-label">Kode Supplier</label>
                    <input type="text" class="form-control" name="id_supplier" id="id_supplier">
                </div>
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon Supplier</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                </div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
