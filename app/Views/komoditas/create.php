<?= $this->extend('layouts/template')?>

<?= $this->section('content') ?>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Elements</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url('komoditas/store') ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="kode">Kode <span style="color: #f54242;">*</span></label>
                                <input type="text" class="form-control" id="kode" name="komoditas_kode"
                                    value="<?= $no_komo ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama<span style="color: #f54242;">*</span></label>
                                <input type="text" class="form-control" id="nama" name="komoditas_nama"
                                    value="<?= old('nama') ?>" />
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Simpan" class="btn btn-info" />
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div><!-- container -->

</div> <!-- Page content Wrapper -->

<?= $this->endSection() ?>