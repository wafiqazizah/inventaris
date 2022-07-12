<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Detail User</h5>
                <div class="card-body">
                    <label for="id_user" class="form-label">Kode User   : </label>
                    <h7 class="card-text"><?= $user['id_user']; ?></h7> <br>
                    <label for="nama" class="form-label">Nama User   : </label>
                    <h7 class="card-title"><?= $user['nama']; ?></h7> <br>
                    <label for="username" class="form-label">Username   : </label>
                    <h7 class="card-text"><?= $user['username']; ?></h7> <br>
                    <label for="email" class="form-label">Email   : </label>
                    <h7 class="card-text"><?= $user['email']; ?></h7> <br>
                    <label for="no_telp" class="form-label">No Telepon User  : </label>
                    <h7 class="card-text"><?= $user['no_telp']; ?></h7> <br>
                    <label for="role" class="form-label">Role  : </label>
                    <h7 class="card-text"><?= $user['role']; ?></h7> <br>
                    <a href="http://localhost/inventaris/User" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>