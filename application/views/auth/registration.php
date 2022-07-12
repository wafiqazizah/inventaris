<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Pendaftaran Baru</h1>
                    </div>
                    <form class="user" method="post" action="http://localhost/inventaris/auth/registration">
                    <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                placeholder="Nama Panjang" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="username" name="username"
                                placeholder="Username" value="<?= set_value('username'); ?>">
                            <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email"
                                placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                            <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp"
                                placeholder="No Telepon" value="<?= set_value('no_telp'); ?>">
                            <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="password2" name="password2" placeholder="Ulangi Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="http://localhost/inventaris/auth/index">Sudah Punya Akun? Masuk!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>