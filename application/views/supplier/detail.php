<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Detail Supplier</h5>
                <div class="card-body">
                    <label for="id_supplier" class="form-label">Kode Supplier   : </label>
                    <h7 class="card-text"><?= $supplier['id_supplier']; ?></h7> <br>
                    <label for="nama_supplier" class="form-label">Nama Supplier   : </label>
                    <h7 class="card-text"><?= $supplier['nama_supplier']; ?></h7> <br>
                    <label for="no_telp" class="form-label">Nomer Telepon Supplier   : </label>
                    <h7 class="card-text"><?= $supplier['no_telp']; ?></h7> <br>
                    <label for="alamat" class="form-label">Alamat Supplier   : </label>
                    <h7 class="card-text"><?= $supplier['alamat']; ?></h7> <br>
                    <a href="http://localhost/inventaris/Supplier" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>