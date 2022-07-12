<div class="container">
    <div class="row mt-3">
        <div class="col=md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_barang_masuk" class="form-label">Kode Barang Masuk</label>
                    <input type="text" class="form-control" name="id_barang_masuk" id="id_barang_masuk">
                </div>
                <div class="mb-3">
                    <label for="id_user" class="form-label">Kode User</label>
                    <input type="text" class="form-control" name="id_user" id="id_user">
                </div>
                <div class="mb-3">
                    <label for="id_barag" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" name="id_barang" id="id_barang">
                </div>
                <div class="mb-3">
                    <label for="jumlah_masuk" class="form-label">Jumlah Masuk</label>
                    <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk">
                </div>
                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="text" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
                </div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>