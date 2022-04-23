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
                                    <h4>Surat Pemberitahuan Dimulai Penyidikan</h4>
                                    <span>Data - Data SPDP</span>
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

                                    <?php if ($this->session->flashdata('flash')) : ?> <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Selamat <strong>Proses SPDP</strong> Telah Diproses <?= $this->session->flashdata('flash'); ?>.
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="example" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Tersangka</th>
                                                        <th>Pasal</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($spdp as $value) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $value['nama_tersangka'] ?></td>
                                                            <td><?= $value['pasal'] ?></td>
                                                            <td><?= date("d/m/Y", strtotime($value['tgl'])); ?></td>
                                                            <td>
                                                                <?php
                                                                $id = $value['id'];
                                                                $sql2 = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='3'";
                                                                $query2 = $this->db->query($sql2);
                                                                if ($query2->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/bexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Exposes</i>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= base_url() ?>user/w1/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share"></i>
                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
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