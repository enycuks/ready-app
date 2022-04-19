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
                                    <span>Proses SPDP</span>
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
                                    <h4 class="sub-title">Proses Data SPDP</h4>
                                    <form method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Penyidik</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="id" value="<?= $spdp['id'] ?>">
                                                <input type="text" class="form-control" name="penyidik" value="<?= $spdp['pyd_nama'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Tersangka</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tersangka" placeholder="Masukkan Nama Tersangka" value="<?= $spdp['tsk'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pasal</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="pasal" placeholder="Masukkan Pasal" value="<?= $spdp['psl'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">JPU</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="jpu" value="<?= $spdp['jp_nama'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">KASI Terkait</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kasi" value="<?= $spdp['ks_nama'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">ASPIDUM</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="aspidum" value="<?= $spdp['asp_nama'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">APAKAH SUDAH TAHAP 1 ?
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="status" required>
                                                    <option value="n" <?php if ($spdp['sts'] == 'n') {
                                                                            echo 'selected';
                                                                        } ?>> Belum </option>
                                                    <option value="y" <?php if ($spdp['sts'] == 'y') {
                                                                            echo 'selected';
                                                                        } ?>> Sudah </option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php if ($spdp['sts'] == 'y') : ?>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">APAKAH SUDAH TAHAP 2 ?
                                                </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status1">
                                                        <option value="n" <?php if ($spdp['sts'] == 'n') {
                                                                                echo 'selected';
                                                                            } ?>> Belum </option>
                                                        <option value="y" <?php if ($spdp['sts'] == 'y') {
                                                                                echo 'selected';
                                                                            } ?>> Sudah </option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                                        <a href="<?= base_url() ?>user/jpu" type="reset" class="btn btn-danger btn-sm">Kembali</a>
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