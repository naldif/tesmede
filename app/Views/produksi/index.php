<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <!-- <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active">Datatable</li> -->
                        </ol>
                    </div>
                    <h4 class="page-title">Tes PT Mede Media Softika</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Tabel Produksi</h4>
                        <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <a href="<?= base_url('/produksi/create'); ?>" class="btn btn-primary">Tambah</a>
                        <hr />
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Komoditas</th>
                                    <th>Produksi (Ton)</th>
                                    <th>Control</th>
                                </tr>
                            </thead>


                            <tbody>
                            <?php
                                    $no = 1;
                                    foreach ($produksi as $row) {
                                    ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                  
                                    <td><?= date('d M Y',strtotime($row->tanggal)); ?></td>
                                    <td><?= $row->komoditas_nama; ?></td>
                                    <td><?= $row->produksi; ?></td>

                                    <td>
                                        <a title="Detail" href="<?= base_url("produksi/detail/$row->id"); ?>"
                                            class="btn btn-secondary waves-effect">Detail</a>
                                        <a title="Edit" href="<?= base_url("produksi/edit/$row->id"); ?>"
                                            class="btn btn-info waves-effect waves-light">Edit</a>
                                        <a title="Delete" href="<?= base_url("produksi/delete/$row->id") ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                    }
                    ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->

<?= $this->endSection() ?>