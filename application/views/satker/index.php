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
                                    <h4>SATUAN KERJA WIALAYAH HUKUM Se - KALTENG</h4>
                                    <span>Data - Data Satuan Kerja</span>
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
                                    <h4 class="sub-title">Data Satker</h4>
                                    <a href="<?= base_url() ?>satker/add" class="btn btn-info btn-sm"> Tambah </a><br>
                                    <br>
                                    <?php if ($this->session->flashdata('flash')) : ?> <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Selamat <strong>Satuan Kerja</strong> <?= $this->session->flashdata('flash'); ?>.
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Satker</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($satker as $value) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $value['satker'] ?></td>
                                                            <td><a href="<?= base_url() ?>satker/update/<?= $value['id_satker']; ?>" class="btn btn-success btn-sm">
                                                                    <i class="icofont icofont-pencil-alt-5"></i>
                                                                </a>
                                                                <a onclick="return confirm('Yakin Hapus')" href="<?= base_url() ?>satker/delete/<?= $value['id_satker']; ?>" class="btn btn-danger btn-sm">
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