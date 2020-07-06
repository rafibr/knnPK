<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view("_partials/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("_partials/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Akurasi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php $this->load->view("_partials/breadcrumb.php") ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Left col -->
                    <section>
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-arrows-alt-h mr-1"></i>
                                    Akurasi
                                </h3>

                                <div class="card-tools" id="tools">

                                    <a href="#" type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#targetModal">
                                        <span class="text text-white font-weight-bold">Import Data</span>
                                    </a>

                                    <!-- Modal Import Data-->
                                    <div class="modal fade" id="targetModal" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Upload Data Excel</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php print site_url(); ?>phpspreadsheet/uploadTesting" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                                                        <h4>Format tabel harap menyesuaikan pada <a href="<?= site_url('assets/format_excel/format_data_testing.xlsx') ?>"><u>file</u></a> ini.</h4>


                                                        <p><label>Select Excel File</label>
                                                            <input type="file" name="fileURL" id="validatedCustomFile" required accept=".xls, .xlsx" /></p>
                                                        <br />
                                                        <input type="submit" name="import" value="Import" class="btn btn-info" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="tab-content p-0">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nilai KP</th>
                                                <th>Nilai PBO</th>
                                                <th>Nilai PW</th>
                                                <th>Nilai RPL</th>
                                                <th>Nilai APS</th>
                                                <th>Nilai MANPRO</th>
                                                <th>Nilai KWU</th>
                                                <th>Nilai TKTI</th>
                                                <th>Label Fakta</th>
                                                <th>Label Prediksi</th>
                                                <th>Set Data</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($testing as $t) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $t->NAMA_DATA_TESTING ?></td>
                                                    <td><?= $t->KP_DATA_TESTING ?></td>
                                                    <td><?= $t->PBO_DATA_TESTING ?></td>
                                                    <td><?= $t->PW_DATA_TESTING ?></td>
                                                    <td><?= $t->RPL_DATA_TESTING ?></td>
                                                    <td><?= $t->APS_DATA_TESTING ?></td>
                                                    <td><?= $t->MANPRO_DATA_TESTING ?></td>
                                                    <td><?= $t->KWU_DATA_TESTING ?></td>
                                                    <td><?= $t->TKTI_DATA_TESTING ?></td>
                                                    <td>
                                                        <?php
                                                        if ($t->LABEL_FACT_DATA_TESTING == '1') {
                                                            echo "Analis";
                                                        } else if ($t->LABEL_FACT_DATA_TESTING == '2') {
                                                            echo "Programmer";
                                                        } else if ($t->LABEL_FACT_DATA_TESTING == '3') {
                                                            echo "PM";
                                                        } else {
                                                            echo "Belum di Uji";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($t->LABEL_PREDICT_DATA_TESTING == '1') {
                                                            echo "Analis";
                                                        } else if ($t->LABEL_PREDICT_DATA_TESTING == '2') {
                                                            echo "Programmer";
                                                        } else if ($t->LABEL_PREDICT_DATA_TESTING == '3') {
                                                            echo "PM";
                                                        } else {
                                                            echo "Belum di Uji";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $t->BATCH_DATA_TESTING ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nilai KP</th>
                                                <th>Nilai PBO</th>
                                                <th>Nilai PW</th>
                                                <th>Nilai RPL</th>
                                                <th>Nilai APS</th>
                                                <th>Nilai MANPRO</th>
                                                <th>Nilai KWU</th>
                                                <th>Nilai TKTI</th>
                                                <th>Label Fakta</th>
                                                <th>Label Prediksi</th>
                                                <th>Set Data</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div><!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

            <!-- Uji content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Left col -->
                    <section>
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">

                                </h3>

                                <div class="card-tools" id="tools">
                                    <a href="#" type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#batchModal">
                                        <span class="text text-white font-weight-bold">Uji Semua</span>
                                    </a>

                                    <a href="#" type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#batchModalConf">
                                        <span class="text text-white font-weight-bold">Confusion Matrix</span>
                                    </a>

                                    <a href="#" type="button" class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#deleteAll">
                                        <span class="text text-white font-weight-bold">Hapus semua data</span>
                                    </a>

                                    <!-- Modal Hapus Semua Data-->
                                    <div class="modal fade" id="deleteAll" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus semua data?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                    <a href="<?= site_url('admin/Akurasi/deleteAllTesting') ?>" class="btn btn-danger">Hapus </a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Set Data-->
                                    <div class="modal fade" id="batchModal" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Uji Set Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('admin/Akurasi/ujiBatch') ?>" method="get" id="ujiBatch">
                                                        <div class="form-group">
                                                            <label>Set Data</label>
                                                            <select class="form-control" id="dataTest" name="setData">
                                                                <option value="2017">2017</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" form="ujiBatch" class="btn btn-primary">Uji</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="card-tools" id="tools">

                                        <!-- Modal Conf Data-->
                                        <div class="modal fade" id="batchModalConf" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Uji Set Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= site_url('confusion') ?>" method="get" id="confusion">
                                                            <div class="form-group">
                                                                <label>Set Data</label>
                                                                <select class="form-control" id="dataTest" name="setData">
                                                                    <option value="2017">2017</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" form="confusion" class="btn btn-primary">Uji</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div><!-- /.card-header -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php $this->load->view("_partials/footer.php") ?>

        <!-- Control Sidebar -->
        <?php $this->load->view("_partials/control_sidebar.php") ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>
    <script>
        $(function() {
            $('#example2').DataTable();
        });
    </script>
</body>

</html>