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
                                    <h4 class="sub-title">Exposes Proses Data SPDP</h4>
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
                                        <?php
                                        if(isset($spdp1['tempat'])  != ""):?>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status Berkas ?
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="Ekspose" required readonly>
                                            </div>
                                        </div>
                                        <?php endif?>
                                        <br>
                                        <?php
                                        if(isset($spdp1['tempat'])  != ""):?>
                                        <h4 class="sub-title">Exposes</h4>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tempat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tempat" value="<?= $spdp['tempat'] ?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Waktu</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="waktu" value="<?= $spdp['tgl_t2'] ?>" readonly required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Hasil Exposes ?
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="waktu" value="P-21" readonly required>
                                            </div>
                                        </div>
                                        <?php endif?>
                                        <h4 class="sub-title">Tahap 2 Dilakukan</h4>
                                         <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Kejari
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single" name="kejari" required>
                                                    <option value="">--Pilih--</option>
                                                    <?php
                                                    foreach ($kejari as $val) : ?>
                                                        <option value="<?= $val['id_satker'] ?>" <?php if ($val['id_satker'] == $spdp['kejari']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?= $val['satker'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Waktu Tahap 2
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="waktut2" value="<?= $spdp['tgl_t2'] ?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Apakah Sudah Tahap 2 ?
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="t2" required>
                                                    <option value="Belum"> Belum </option>
                                                    <option value="Sudah"> Sudah </option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Proses</button>
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