                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">User</h1>
                            
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data User</strong> <?= $this->session->flashdata('flash'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php endif; ?>

  <?php if (empty($user)) : ?>
    <div class="alert alert-danger" role="alert">
      Data User Tidak ditemukan...
    </div>
  <?php endif; ?>

  <br>
  <div class="row-mt-2">
    <div class="colmd-4">
      <a href="http://localhost/inventaris/User/tambah/" class="btn btn-primary">Tambah Data User</a>
    </div>
	</div>

  <div class="row mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Data User..." name="keyword">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </form>
    </div>
  </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Kode User</th>
                                          <th scope="col">Nama User</th>
                                          <th scope="col">Username</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">No Telepon</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                          <?php foreach ($user as $usr) : ?>
                                            <td><?= ++$start ?></td>
                                                <td><?= $usr['id_user']; ?></td>
                                                <td><?= $usr['nama']; ?></td>
                                                <td><?= $usr['username']; ?></td>
                                                <td><?= $usr['email']; ?></td>
                                                <td><?= $usr['no_telp']; ?></td>
                                                <td> <a href="http://localhost/inventaris/User/detail/<?= $usr['id_user']; ?>" class="btn btn-primary">Detail</a>
                                                     <a href="http://localhost/inventaris/User/ubah/<?= $usr['id_user']; ?>" class="btn btn-success">Ubah</a>
                                                     <a href="http://localhost/inventaris/User/hapus/<?= $usr['id_user']; ?>" class="btn btn-danger" onclick="return confirm ('Apakah Yakin Akan Dihapus?')">Hapus</a></td>
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

