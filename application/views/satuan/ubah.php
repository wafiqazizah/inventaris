<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <input type="hidden" name="id_satuan" id="id_satuan" value="<?= $satuan['id_satuan']; ?>">
                <div class="mb-3">
                    <label for="nama_satuan" class="form-label">Nama Satuan</label>
                    <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" value="<?= $satuan['nama_satuan']; ?>">
                </div>
                <button name="ubah" type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
