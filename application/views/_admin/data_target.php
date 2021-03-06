<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("_partials/head.php") ?>


</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Page Wrapper -->
    <div class="wrapper">

        <!-- Topbar -->
        <?php $this->load->view("_partials/navbar.php") ?>

        <!-- End of Topbar -->

        <!-- Sidebar -->
        <?php $this->load->view("_partials/sidebar.php") ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Target</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php $this->load->view("_partials/breadcrumb.php") ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main Content -->
            <section class="content">



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-fw fa-bullseye mr-1"></i>
                                    Data Target
                                </h3>
                                <div class="card-tools" id="tools">
                                    <a href="#" type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#tambahDataModal">
                                        <span class="text text-white font-weight-bold">Tambah Data</span>
                                    </a>


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
                                                    <form action="<?php print site_url(); ?>phpspreadsheet/uploadTarget" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                                                        <h4>Format tabel harap menyesuaikan pada <a href="<?= site_url('assets/format_excel/format_data_target.xlsx') ?>"><u>file</u></a> ini.</h4>


                                                        <p><label>Select Excel File</label>
                                                            <input type="file" name="fileURL" id="validatedCustomFile" required accept=".xls, .xlsx" /></p>
                                                        <br />
                                                        <input type="submit" name="import" value="Import" class="btn btn-info" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Tambah Data-->
                                    <div class="modal fade" id="tambahDataModal" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('admin/Data_target/addTarget') ?>" method="post">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" maxlength="50" name="name" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai KP</label>
                                                            <input type="text" maxlength="50" name="kp" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai PBO</label>
                                                            <input type="text" maxlength="50" name="pbo" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai PW</label>
                                                            <input type="text" maxlength="50" name="pw" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai RPL</label>
                                                            <input type="text" maxlength="50" name="rpl" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai APS</label>
                                                            <input type="text" maxlength="50" name="aps" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai MANPRO</label>
                                                            <input type="text" maxlength="50" name="manpro" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai KWU</label>
                                                            <input type="text" maxlength="50" name="kwu" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai TKTI</label>
                                                            <input type="text" maxlength="50" name="tkti" class="form-control" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Tambah</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="data_training" class="table table-bordered table-hover">
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
                                                <th>Label</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($target as $data) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->NAMA_DATA_TARGET ?></td>
                                                    <td><?= $data->KB_DATA_TARGET ?></td>
                                                    <td><?= $data->PBO_DATA_TARGET ?></td>
                                                    <td><?= $data->PW_DATA_TARGET ?></td>
                                                    <td><?= $data->RPL_DATA_TARGET ?></td>
                                                    <td><?= $data->APS_DATA_TARGET ?></td>
                                                    <td><?= $data->MANPRO_DATA_TARGET ?></td>
                                                    <td><?= $data->KWU_DATA_TARGET ?></td>
                                                    <td><?= $data->TKTI_DATA_TARGET ?></td>
                                                    <td>
                                                        <?php
                                                        if ($data->LABEL_DATA_TARGET == '1') {
                                                            echo "Analis";
                                                        } else if ($data->LABEL_DATA_TARGET == '2') {
                                                            echo "Programmer";
                                                        } else if ($data->LABEL_DATA_TARGET == '3') {
                                                            echo "PM";
                                                        } else {
                                                            echo "Belum di Uji";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ujiModal<?= $data->ID_DATA_TARGET ?>">Uji</button>
                                                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?= $data->ID_DATA_TARGET ?>">Edit</a>
                                                        <a href='<?= site_url('admin/Data_target/deleteTarget/' . $data->ID_DATA_TARGET) ?>' type="button" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>

                                                <!-- Uji Modal-->
                                                <div class="modal fade" id="ujiModal<?= $data->ID_DATA_TARGET ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('testTarget') ?>" method="get" id="uji<?= $data->ID_DATA_TARGET ?>">
                                                                    <input type="number" name="K-Value" min="1" max="<?= $countTrain->max; ?>" required> Nilai K
                                                                    <br>
                                                                    <input type="hidden" value="<?= $data->ID_DATA_TARGET ?>" name="idData">
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" form="uji<?= $data->ID_DATA_TARGET ?>" class="btn btn-primary">Uji</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Edit -->
                                                <!-- Modal Edit Data-->
                                                <div class="modal fade" id="modalEdit<?= $data->ID_DATA_TARGET ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('admin/Data_target/editTarget') ?>" method="post">
                                                                    <input type="hidden" name='idTarget' value="<?= $data->ID_DATA_TARGET ?>">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" maxlength="50" name="name" class="form-control" required value="<?= $data->NAMA_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai KP</label>
                                                                        <input type="text" maxlength="50" name="kp" class="form-control" required value="<?= $data->KB_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai PBO</label>
                                                                        <input type="text" maxlength="50" name="pbo" class="form-control" required value="<?= $data->PBO_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai PW</label>
                                                                        <input type="text" maxlength="50" name="pw" class="form-control" required value="<?= $data->PW_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai RPL</label>
                                                                        <input type="text" maxlength="50" name="rpl" class="form-control" required value="<?= $data->RPL_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai APS</label>
                                                                        <input type="text" maxlength="50" name="aps" class="form-control" required value="<?= $data->APS_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai MANPRO</label>
                                                                        <input type="text" maxlength="50" name="manpro" class="form-control" required value="<?= $data->MANPRO_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai KWU</label>
                                                                        <input type="text" maxlength="50" name="kwu" class="form-control" required value="<?= $data->KWU_DATA_TARGET ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nilai TKTI</label>
                                                                        <input type="text" maxlength="50" name="tkti" class="form-control" required value="<?= $data->TKTI_DATA_TARGET ?>">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">Edit</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            endforeach;
                                            ?>
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
                                                <th>Label</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>

                </div>
                <!-- /.container-fluid -->

            </section>
            <!-- End of Main Content -->

            <section class="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                </h3>
                                <div class="card-tools" id="tools">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <a href="#" type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#deleteAll">
                                                <span class="text text-white font-weight-bold">Uji semua data</span>
                                            </a> -->

                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" type="button" class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#deleteAll">
                                                <span class="text text-white font-weight-bold">Hapus semua data</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
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

                                                <a href="<?= site_url('admin/Data_target/deleteAllTarget') ?>" class="btn btn-danger">Hapus </a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div><!-- /.card-header -->

                        </div>
                        <!-- /.card -->
                    </section>

                </div>
                <!-- /.container-fluid -->

            </section>


        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        <?php $this->load->view("_partials/footer.php") ?>

        <!-- End of Footer -->
        <!-- Control Sidebar -->
        <?php $this->load->view("_partials/control_sidebar.php") ?>
        <!-- /.control-sidebar -->

    </div>
    <!-- End of Page Wrapper -->

    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#data_training').DataTable();
        });
    </script>

</body>

</html>