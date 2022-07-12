                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang Keluar</h1>
                            
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data Barang Keluar</strong> <?= $this->session->flashdata('flash'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php endif; ?>

  <?php if (empty($barangkeluar)) : ?>
    <div class="alert alert-danger" role="alert">
      Data Barang Keluar Tidak ditemukan...
    </div>
  <?php endif; ?>

  <br>
  <div class="row-mt-3">
    <div class="colmd-6">
      <a href="http://localhost/invetaris/Barangkeluar/tambah/" class="btn btn-primary">Tambah Data Barang Keluar</a>
    </div>


  <br>
  <div class="row-mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="formcontrol" placeholder="Cari Data Barang Keluar..." name="keyword">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </form>
    </div>
  </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang Keluar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Kode Barang Keluar</th>
                                          <th scope="col">User</th>
                                          <th scope="col">Nama Barang</th>
                                          <th scope="col">Nama Supplier</th>
                                          <th scope="col">Jumlah Barang Keluar</th>
                                          <th scope="col">Tanggal Barang Keluar</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                          <?php foreach ($barangkeluar as $brgk) : ?>
                                            <td><?= ++$start ?></td>
                                                <td><?= $brgk['id_barang_keluar']; ?></td>
                                                <td><?= $brgk['id_user']; ?></td>
                                                <td><?= $brgk['nama_barang']; ?></td>
                                                <td><?= $brgk['nama_supplier']; ?></td>
                                                <td><?= $brgk['jumlah_keluar']; ?></td>
                                                <td><?= $brgk['tanggal_keluar']; ?></td>
                                                <td> <a href="http://localhost/inventaris/Barangkeluar/detail/<?= $brgk['id_barang_keluar']; ?>" class="btn btn-primary">Detail</a>
                                                     <a href="http://localhost/inventaris/Barangkeluar/ubah/<?= $brgk['id_barang_keluar']; ?>" class="btn btn-success">Ubah</a>
                                                     <a href="http://localhost/inventaris/Barangkeluar/hapus/<?= $brgk['id_barang_keluar']; ?>" class="btn btn-danger" onclick="return confirm ('Apakah Yakin Akan Dihapus?')">Hapus</a></td>
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

