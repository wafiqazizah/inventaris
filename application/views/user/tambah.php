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
                    <label for="id_user" class="form-label">Kode User</label>
                    <input type="text" class="form-control" name="id_user" id="id_user">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="usename" id="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp">
                </div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
