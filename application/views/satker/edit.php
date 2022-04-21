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
                                    <h4>SATKER</h4>
                                    <span>Data - Data Satker</span>
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
                                    <h4 class="sub-title">Edit Data Satker</h4>
                                    <form method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jaksa</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" name="id" value="<?= $satker['id_satker'] ?>">
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Satker" value="<?= $satker['satker'] ?>" required>
                                            </div>
                                        </div>
                                        <button type=" submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <button type="reset" class="btn btn-danger btn-sm">Batal</button>
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