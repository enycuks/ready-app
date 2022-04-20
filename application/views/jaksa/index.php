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
                                    <h4 class="sub-title">Data User</h4>
                                    <a href="<?= base_url() ?>jaksa/add" class="btn btn-info btn-sm"> Tambah </a><br>
                                    <br>
                                    <?php if ($this->session->flashdata('flash')) : ?> <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Selamat <strong>User</strong> <?= $this->session->flashdata('flash'); ?>.
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="example" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>NIP</th>
                                                        <th>Jabatan</th>
                                                        <th>Satker</th>
                                                        <th>Email</th>
                                                        <th>No HP</th>
                                                        <th>Role</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($jaksa as $value) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $value['nama'] ?></td>
                                                            <td><?= $value['nip'] ?></td>
                                                            <td><?= $value['jabatan'] ?></td>
                                                            <td><?= $value['satker'] ?></td>
                                                            <td><?= $value['email'] ?></td>
                                                            <td><?= $value['no_hp'] ?></td>
                                                            <td><?= $value['role'] ?></td>
                                                            <td><a href="<?= base_url() ?>jaksa/update/<?= $value['id_user']; ?>" class="btn btn-success btn-sm">
                                                                    <i class="icofont icofont-pencil-alt-5"></i>
                                                                </a>
                                                                <a onclick="return confirm('Yakin Hapus')" href="<?= base_url() ?>jaksa/delete/<?= $value['id_user']; ?>" class="btn btn-danger btn-sm">
                                                                    <i class="icofont icofont-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

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