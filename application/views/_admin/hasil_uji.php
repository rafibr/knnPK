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
                            <h1 class="m-0 text-dark">Hasil Uji</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php $this->load->view("_partials/breadcrumb.php") ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Hasil Content -->
            <section class="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-fw fa-database mr-1"></i>
                                    Hasil Data Uji
                                </h3>
                                <br>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">

                                    <table id="hasil_uji" class="table table-bordered table-hover">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>1</td>
                                            <td><?= $target->NAMA_DATA_TARGET ?></td>
                                            <td><?= $target->KB_DATA_TARGET ?></td>
                                            <td><?= $target->PBO_DATA_TARGET ?></td>
                                            <td><?= $target->PW_DATA_TARGET ?></td>
                                            <td><?= $target->RPL_DATA_TARGET ?></td>
                                            <td><?= $target->APS_DATA_TARGET ?></td>
                                            <td><?= $target->MANPRO_DATA_TARGET ?></td>
                                            <td><?= $target->KWU_DATA_TARGET ?></td>
                                            <td><?= $target->TKTI_DATA_TARGET ?></td>
                                            <td><?php
                                                if ($target->LABEL_DATA_TARGET == '1') {
                                                    echo "Analis";
                                                } else if ($target->LABEL_DATA_TARGET == '2') {
                                                    echo "Programmer";
                                                } else if ($target->LABEL_DATA_TARGET == '3') {
                                                    echo "PM";
                                                }
                                                ?></td>
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
            <!-- End of Hasil Content -->

            <!-- Jarak Content -->
            <section class="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-fw fa-database mr-1"></i>
                                    Jarak
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="jarak" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jarak</th>
                                                <th>Label</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1;
                                            foreach ($distance as $dist) :  ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $dist['nama'] ?></td>
                                                    <td><?= $dist['jarak'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($dist['label Train']  == '1') {
                                                            echo "Analis";
                                                        } else if ($dist['label Train']  == '2') {
                                                            echo "Programmer";
                                                        } else if ($dist['label Train']  == '3') {
                                                            echo "PM";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jarak</th>
                                                <th>Label</th>
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
            <!-- End of Jarak Content -->

            <!-- KNN Content -->
            <section class="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-fw fa-database mr-1"></i>
                                    KNN
                                </h3>
                                <br>

                                <h2 class="card-title">
                                    Nilai K = <?= $_GET['K-Value'] ?>
                                </h2>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">

                                    <?php if (count($knnAnalis) != 0) : ?>
                                        <h4>Tetangga pada label "Analis"</h4>
                                        <table id="tetangga_analis" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($knnAnalis as $an) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $an['nama'] ?></td>
                                                        <td><?= $an['jarak'] ?></td>
                                                        <td>Analis</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    <?php endif; ?>

                                    <?php if (count($knnProgrammer) != 0) : ?>
                                        <h4>Tetangga pada label "Programmer"</h4>
                                        <table id="tetangga_programmer" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($knnProgrammer as $pro) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $pro['nama'] ?></td>
                                                        <td><?= $pro['jarak'] ?></td>
                                                        <td>Programmer</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    <?php endif; ?>

                                    <?php if (count($knnPM) != 0) : ?>
                                        <h4>Tetangga pada label "PM"</h4>
                                        <table id="tetangga_pm" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($knnPM as $pm) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $pm['nama'] ?></td>
                                                        <td><?= $pm['jarak'] ?></td>
                                                        <td>PM</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jarak</th>
                                                    <th>Label</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    <?php endif; ?>

                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>

                </div>
                <!-- /.container-fluid -->

            </section>
            <!-- End of KNN Content -->



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
            $('#jarak').DataTable();
            $('#tetangga_analis').DataTable();
            $('#tetangga_programmer').DataTable();
            $('#tetangga_pm').DataTable();
            $('#hasil_uji').DataTable();
        });
    </script>

</body>

</html>