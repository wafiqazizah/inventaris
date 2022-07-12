<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Detail Barang</h5>
                <div class="card-body">
                    <label for="id_barang" class="form-label">Kode Barang   : </label>
                    <h7 class="card-title"><?= $barang['id_barang']; ?></h7> <br>
                    <label for="nama_barang" class="form-label">Nama Barang   : </label>
                    <h7 class="card-title"><?= $barang['nama_barang']; ?></h7> <br>
                    <label for="nama_jenis" class="form-label">Jenis Barang  : </label>
                    <h7 class="card-title"><?= $barang['id_jenis']; ?></h7> <br>
                    <label for="nama_satuan" class="form-label">Satuan Barang : </label>
                    <h7 class="card-title"><?= $barang['id_satuan']; ?></h7> <br>
                    <label for="stok" class="form-label">Stok Barang   : </label>
                    <h7 class="card-title"><?= $barang['stok']; ?></h7> <br>
                    <a href="http://localhost/inventaris/Barang" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>