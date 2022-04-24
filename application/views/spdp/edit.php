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
                                    <span>Ubah SPDP</span>
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
                                    <h4 class="sub-title">Ubah Data SPDP</h4>
                                    <form method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Penyidik</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?= $spdp['id'] ?>">
                                                <select class="js-example-basic-single" name="penyidik" required>
                                                    <option value="">--Pilih Penyidik--</option>
                                                    <?php
                                                    foreach ($penyidik as $val) : ?>
                                                        <option value="<?= $val['id_instansi'] ?>" <?php if ($val['id_instansi'] == $spdp['penyidik']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Tersangka</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tersangka" placeholder="Masukkan Nama Tersangka" value="<?= $spdp['nama_tersangka'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pasal</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="pasal" placeholder="Masukkan Pasal" value="<?= $spdp['pasal'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">JPU</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="jpu" required>
                                                    <option value="">--Pilih JPU--</option>
                                                    <?php
                                                    foreach ($jpu as $val) : ?>
                                                        <option value="<?= $val['id_user'] ?>" <?php if ($val['id_user'] == $spdp['jpu']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">KASI Terkait</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="kasi" required>
                                                    <option value="">--Pilih KASI--</option>
                                                    <?php
                                                    foreach ($kasi as $val) : ?>
                                                        <option value="<?= $val['id_user'] ?>" <?php if ($val['id_user'] == $spdp['kasi']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ASPIDUM</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="aspidum" required>
                                                    <option value="">--Pilih ASPIDUM--</option>
                                                    <?php
                                                    foreach ($aspidum as $val) : ?>
                                                        <option value="<?= $val['id_user'] ?>" <?php if ($val['id_user'] == $spdp['aspidum']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">WAKAJATI</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="waka" required>
                                                    <option value="">--Pilih WAKAJATI--</option>
                                                    <?php
                                                    foreach ($waka as $val) : ?>
                                                        <option value="<?= $val['id_user'] ?>" <?php if ($val['id_user'] == $spdp['waka']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Koordinator</label>
                                            <div class="col-sm-10">
                                                <select class="js-example-basic-single" name="koor" required>
                                                    <option value="">--Pilih Koordinator--</option>
                                                    <?php
                                                    foreach ($koor as $val) : ?>
                                                        <option value="<?= $val['id_user'] ?>" <?php if ($val['id_user'] == $spdp['koor']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $val['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
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