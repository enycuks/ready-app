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
                                                        <th>No</th>
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
                                                                $sql = "SELECT id, tgl, DATEDIFF(CURDATE(), tgl) FROM data_pelapor WHERE DATEDIFF(CURDATE(), tgl)=-30 && id=$id && s1='n' && p17='Belum'";
                                                                $query = $this->db->query($sql);

                                                                $p17 = "SELECT id, s1, p17 FROM data_pelapor WHERE  id=$id && s1='n' && p17='Sudah'";
                                                                $query17 = $this->db->query($p17);

                                                                $sql1 = "SELECT id, s1, berkas FROM data_pelapor WHERE  id=$id && s1='y' && berkas = 'Proses' OR berkas ='Belum' && jexposes = 0";
                                                                $query1 = $this->db->query($sql1);

                                                                $sqlberkas = "SELECT id, s1, berkas FROM data_pelapor WHERE  id=$id && s1='y' && berkas ='Sudah' && exposes='a' && jexposes = 0";
                                                                $queryberkas = $this->db->query($sqlberkas);

                                                                $sql2 = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='Expose' && jexposes < 0 ";
                                                                $query2 = $this->db->query($sql2);
                                                                
                                                                $sql2e = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='Expose' && exposes='Expose' ";
                                                                $query2e = $this->db->query($sql2e);

                                                                $sql3 = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='Expose' && exposes='a' && jexposes > 0 && hasil_exposes IS NULL";
                                                                $query3 = $this->db->query($sql3);

                                                                $sje = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='Expose' && exposes='a' && jexposes = 0 && hasil_exposes IS NULL";
                                                                $qjex = $this->db->query($sje);

                                                                $je = "SELECT id, tgl FROM data_pelapor WHERE  id=$id && s1='y' && berkas='Belum' && exposes='Belum' && jexposes > 0 && hasil_exposes IS NULL";
                                                                $qje = $this->db->query($je);
                                                        
                                                                $sql4 = "SELECT id, tgl, hasil_exposes FROM data_pelapor WHERE  id=$id && s1='y' && hasil_exposes='P-18'";
                                                                $query4 = $this->db->query($sql4);

                                                                $sql5 = "SELECT id, hasil_exposes FROM data_pelapor WHERE id=$id && s1='y' && berkas='Sudah' && exposes='Sudah' && kejari='' ";
                                                                $query5 = $this->db->query($sql5);
                                                                
                                                                $sa = "SELECT id, hasil_exposes FROM data_pelapor WHERE id=$id && s1='y' && berkas='Expose' && exposes=''";
                                                                $qa = $this->db->query($sa);

                                                                $sqlhe = "SELECT id, hasil_exposes FROM data_pelapor WHERE id=$id && s1='y' && berkas='Expose' && hasil_exposes='P-21' && kejari=''";
                                                                $queryhe = $this->db->query($sqlhe);

                                                                $sqlhew = "SELECT id, hasil_exposes FROM data_pelapor WHERE id=$id && s1='y' && berkas='Belum' && hasil_exposes='P-21' && kejari=''";
                                                                $queryhew = $this->db->query($sqlhew);
                                                                
                                                                $sqlhew = "SELECT id, hasil_exposes FROM data_pelapor WHERE id=$id && s1='y' && berkas='Belum' && hasil_exposes='P-21' && kejari=''";
                                                                $queryhew = $this->db->query($sqlhew);

                                                                $sql6 = "SELECT id, t2 FROM data_pelapor WHERE id=$id && s1='y' && berkas='Sudah' && exposes='Sudah' && t2!='Sudah'";
                                                                $query6 = $this->db->query($sql6);

                                                                $t2he = "SELECT id, t2 FROM data_pelapor WHERE id=$id && s1='y' && berkas='Expose' && hasil_exposes='P-21' && t2 !='Sudah'";
                                                                $qt2he = $this->db->query($t2he);

                                                                $t2hew = "SELECT id, t2 FROM data_pelapor WHERE id=$id && s1='y' && berkas='Belum' && hasil_exposes='P-21' && t2 !='Sudah'";
                                                                $qt2hew = $this->db->query($t2hew);
                                                                
                                                                $sql7 = "SELECT id FROM data_pelapor WHERE id=$id && s1='y' && t2='Sudah'";
                                                                $query7 = $this->db->query($sql7);

                                                                $sql18 = "SELECT id FROM data_pelapor WHERE id=$id && s1='y' && hasil_exposes='P-18' && petunjuk='Sudah'";
                                                                $query18 = $this->db->query($sql18);

                                                                if ($query->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p17/<?= $value['id']; ?>" class="btn btn-danger btn-sm">
                                                                        <i class="ti-share">Terbikan P-17</i>
                                                                    </a>
                                                                    
                                                                <?php
                                                                } elseif ($query17->num_rows() > 0) { ?>
                                                                    Selesai P-17 Sudah Di Terbitkan
                                                                    <?php
                                                                } elseif ($query18->num_rows() > 0) { ?>
                                                                    Selesai Selesai P-18
                                                                <?php
                                                                } elseif ($queryberkas->num_rows() > 0) { ?>
                                                                    Menunggu Keputusan ASPIDUM
                                                                <?php
                                                                } elseif ($query1->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/b1/<?= $value['id']; ?>" class="btn btn-success btn-sm">
                                                                        <i class="ti-share"></i> Berkas Sudah Lengkap
                                                                    </a>
                                                                <?php
                                                                } elseif ($query2->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/bexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Exposes</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($qjex->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/bexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Exposes</i>
                                                                    </a>
                                                                <?php
                                                                } elseif ($query3->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/hexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Hasil Exposes1</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($qje->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/hexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Hasil Exposes2</i>
                                                                    </a>
                                                                    
                                                                   <?php
                                                                } elseif ($query2e->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/hexposes/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">Hasil Exposes3</i>
                                                                    </a>
                                                                    
                                                                <?php
                                                                } elseif ($query4->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p18/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">P-18</i>
                                                                    </a>
                                                                <?php
                                                                } elseif ($query5->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p21/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">P21</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($queryhe->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p21/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">P21</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($queryhew->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p21/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">P21</i>
                                                                    </a>
                                                                     <?php
                                                                } elseif ($qa->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/p21/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">P21</i>
                                                                    </a>
                                                                <?php
                                                                } elseif ($query6->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/t2/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">T2 Sudah?k</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($qt2he->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/t2/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">T2 Sudah?k</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($qt2hew->num_rows() > 0) { ?>
                                                                    <a href="<?= base_url() ?>user/t2/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">T2 Sudah?k</i>
                                                                    </a>
                                                                    <?php
                                                                } elseif ($query7->num_rows() > 0) { ?>
                                                                    Selesai
                                                                <?php } else { ?>
                                                                    <a href="<?= base_url() ?>user/p1/<?= $value['id']; ?>" class="btn btn-primary btn-sm">
                                                                        <i class="ti-share">.Awal</i>
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