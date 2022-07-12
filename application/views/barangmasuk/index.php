                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang Masuk</h1>
                            
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data Barang Masuk</strong> <?= $this->session->flashdata('flash'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php endif; ?>

  <?php if (empty($barangmasuk)) : ?>
    <div class="alert alert-danger" role="alert">
      Data Barang Masuk Tidak ditemukan...
    </div>
  <?php endif; ?>

  <br>
  <div class="row-mt-3">
    <div class="colmd-6">
      <a href="http://localhost/invetaris/Barangmasuk/tambah/" class="btn btn-primary">Tambah Data Barang Masuk</a>
    </div>


  <br>
  <div class="row-mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="formcontrol" placeholder="Cari Data Barang Masuk..." name="keyword">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </form>
    </div>
  </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Kode Barang Masuk</th>
                                          <th scope="col">User</th>
                                          <th scope="col">Nama Barang</th>
                                          <th scope="col">Nama Supplier</th>
                                          <th scope="col">Jumlah Barang Masuk</th>
                                          <th scope="col">Tanggal Barang Masuk</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                          <?php foreach ($barangmasuk as $brgm) : ?>
                                            <td><?= ++$start ?></td>
                                                <td><?= $brgm['id_barang_masuk']; ?></td>
                                                <td><?= $brgm['id_user']; ?></td>
                                                <td><?= $brgm['nama_barang']; ?></td>
                                                <td><?= $brgm['nama_supplier']; ?></td>
                                                <td><?= $brgm['jumlah_masuk']; ?></td>
                                                <td><?= $brgm['tanggal_masuk']; ?></td>
                                                <td> <a href="http://localhost/inventaris/Barangmasuk/detail/<?= $brgm['id_barang_masuk']; ?>" class="btn btn-primary">Detail</a>
                                                     <a href="http://localhost/inventaris/Barangmasuk/ubah/<?= $brgm['id_barang_masuk']; ?>" class="btn btn-success">Ubah</a>
                                                     <a href="http://localhost/inventaris/Barangmasuk/hapus/<?= $brgm['id_barang_masuk']; ?>" class="btn btn-danger" onclick="return confirm ('Apakah Yakin Akan Dihapus?')">Hapus</a></td>
                                            </tr>
                                          <?php endforeach ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

