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
                    <label for="id_jenis" class="form-label">Kode Jenis</label>
                    <input type="text" class="form-control" name="id_jenis" id="id_jenis">
                </div>
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Nama Jenis</label>
                    <input type="text" class="form-control" name="nama_jenis" id="nama_jenis">
                </div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
