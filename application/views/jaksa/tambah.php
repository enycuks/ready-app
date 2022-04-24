<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                                <div class="d-inline">
                                    <h4>USER</h4>
                                    <span>Data - Data User</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">

                                <div class="card-header">
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Tambah Data User</h4>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" placeholder="Nama User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nip" placeholder="NIP User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satker</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="satker" required>
                                                    <option value="">--Pilih Satker--</option>
                                                    <?php
                                                    foreach ($satker as $val) : ?>
                                                        <option value="<?= $val['id_satker'] ?>"><?= $val['satker'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" placeholder="Email User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="hp" placeholder="Nomor HP User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" placeholder="Password User" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="role" required>
                                                    <option value="">--Pilih Role--</option>
                                                    <option value="2">Operator</option>
                                                    <option value="3">Wakajati</option>
                                                    <option value="4">Aspidum</option>
                                                    <option value="5">Kordinator</option>
                                                    <option value="6">Kasi</option>
                                                    <option value="7">JPU</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Profil</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" class="form-control" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <button type="reset" class="btn btn-danger btn-sm">Batal</button>
                                        <input type="button" class="btn btn-info btn-sm" value="Kembali" onclick="history.back(-1)" />

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>