<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <input type="hidden" name="id_user" id="nama" value="<?= $user['id_user']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $user['no_telp']; ?>">
                </div>
                <button name="ubah" type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
