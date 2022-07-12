<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <input type="hidden" name="id_barang_keluar" id="id_barang_keluar" value="<?= $barangk['id_barang_keluar']; ?>">
                <div class="mb-3">
                    <label for="id_supplier" class="formlabel">Kode Supplier</label>
                    <input type="text" class="formcontrol" name="id_supplier" id="id_supplier" value="<?= $barangk['id_supplier']; ?>">
                </div>
                <div class="mb-3">
                    <label for="id_user" class="form-label">Kode User</label>
                    <input type="text" class="formcontrol" name="id_user" id="id_user" value="<?= $barangk['id_user']; ?>">
                </div>
                <div class="mb-3">
                    <label for="id_jenis" class="form-label">Kode Barang</label>
                    <input type="text" class="formcontrol" name="id_barang" id="id_barang" value="<?= $barangk['id_barang']; ?>">
                </div>
                <div class="mb-3">
                    <label for="id_satuan" class="form-label">Jumlah Keluar</label>
                    <input type="text" class="formcontrol" name="jumlah_keluar" id="jumlah_keluar" value="<?= $barangk['jumlah_keluar']; ?>">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Tanggal Keluar</label>
                    <input type="text" class="formcontrol" name="tanggal_keluar" id="tanggal_keluar" value="<?= $barangk['tanggal_keluar']; ?>">
                </div>
                <button name="ubah" type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>