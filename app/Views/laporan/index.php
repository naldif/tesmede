<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tes Nito PT Mede Media Softika</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Tabel Laporan</h4>
                        <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <!-- <a href="<?= base_url('/produksi/create'); ?>" class="btn btn-primary">Tambah</a> -->
                        <hr />
                        <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                  
                                    <th>Tanggal</th>
                                    <th>Komoditas</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agus</th>
                                    <th>Sept</th>
                                    <th>Okt</th>
                                    <th>Nov</th>
                                    <th>Des</th>
                                </tr>
                            </thead>


                            <tbody>
                            <?php
                                foreach ($lapor as $row) {?>
                                    <tr>
                                        <td><?= $row->tahun; ?></td>
                                        <td><?= $row->komoditas_nama; ?></td>
                                        <td><?= $row->januari ?></td>
                                        <td><?= $row->februari ?></td>
                                        <td><?= $row->maret ?></td>
                                        <td><?= $row->april ?></td>
                                        <td><?= $row->mei ?></td>
                                        <td><?= $row->juni ?></td>
                                        <td><?= $row->juli ?></td>
                                        <td><?= $row->agustus ?></td>
                                        <td><?= $row->september ?></td>
                                        <td><?= $row->oktober ?></td>
                                        <td><?= $row->november ?></td>
                                        <td><?= $row->desember ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->

<?= $this->endSection() ?>