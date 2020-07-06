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
                            <h1 class="m-0 text-dark">Data Training</h1>
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
                                    <i class="fas fa-fw fa-database mr-1"></i>
                                    Confusion Matrix
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fakta / Prediksi</th>
                                                <th>Analis</th>
                                                <th>Programmer</th>
                                                <th>PM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Analis</th>
                                                <td bgcolor="lightgreen"><?= $table[0][0] ?></td>
                                                <td><?= $table[0][1] ?></td>
                                                <td><?= $table[0][2] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Programmer</th>
                                                <td><?= $table[1][0] ?></td>
                                                <td bgcolor="lightgreen"><?= $table[1][1] ?></td>
                                                <td><?= $table[1][2] ?></td>
                                            </tr>
                                            <tr>
                                                <th>PM</th>
                                                <td><?= $table[2][0] ?></td>
                                                <td><?= $table[2][1] ?></td>
                                                <td bgcolor="lightgreen"><?= $table[2][2] ?></td>
                                            </tr>

                                        </tbody>

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

            <!-- Main Content -->
            <section class="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>

                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-fw fa-database mr-1"></i>
                                    Confusion Matrix
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <!-- Content Row -->
                                <div class="row">

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            <h2>True Positive (TP)</h2>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>TP Analis = <b><?= $table[0][0] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>TP Programmer = <b><?= $table[1][1] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>TP PM = <b><?= $table[2][2] ?></h5></b>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            <h2>False Positive (FP)</h2>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FP Analis = <b><?= $table[1][0] + $table[2][0] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FP Programmer = <b><?= $table[0][1] + $table[2][1] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FP PM = <b><?= $table[0][2] + $table[1][2] ?></h5></b>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                            <h2>False Negative (FN)</h2>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FN Analis = <b><?= $table[0][1] + $table[0][2] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FN Programmer = <b><?= $table[1][0] + $table[1][2] ?></b></h5>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <h5>FN PM = <b><?= $table[2][0] + $table[2][1] ?></b></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $sumTP = $table[0][0] +
                                    $table[1][1] +
                                    $table[2][2];

                                $precAnalis = $table[0][0] / ($table[0][0] + ($table[1][0] + $table[2][0]));
                                $precProgrammer = $table[1][1] / ($table[1][1] + ($table[0][1] + $table[2][1]));
                                $precPM = $table[2][2] / ($table[2][2] + ($table[0][2] + $table[1][2]));

                                $sumPrec = $precAnalis + $precProgrammer + $precPM;

                                $recAnalis = $table[0][0] / ($table[0][0] + ($table[0][1] + $table[0][2]));
                                $recProgrammer = $table[1][1] / ($table[1][1] + ($table[1][0] + $table[1][2]));
                                $recPM = $table[2][2] / ($table[2][2] + ($table[2][0] + $table[2][1]));

                                $sumRec = $recAnalis + $recProgrammer + $recPM;

                                $avgPrec = ($sumPrec) / 3;
                                $avgRec = ($sumRec) / 3;
                                $f1Score = 2 * (($avgPrec * $avgRec) / ($avgPrec + $avgRec));
                                ?>

                                <div class="tab-content p-0">
                                    <ul class="h5">
                                        <li class="">Accuracy = (TP Analis+TP Programmer+TP PM)/Jumlah Data =
                                            <!-- Accuracy -->
                                            <b><?= ($sumTP) / intval($sumData->sum) ?></b>
                                        </li>
                                        <li class="">Precision Rata-Rata = (Precision Analis+Precision Programmer+Precision PM)/Jumlah Kelas =
                                            <b><?= $avgPrec ?></b>
                                        </li>
                                        <li class="">Recall Rata-Rata = (Recall Analis+Recall Programmer+Recall PM)/Jumlah Kelas =
                                            <b><?= $avgRec ?></b>
                                        </li>
                                        <li class="">F1 Score = 2*((Precision*Recall)/(Precision+Recall)) =
                                            <b><?= $f1Score ?></b>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>

                </div>
                <!-- /.container-fluid -->

            </section>
            <!-- End of Main Content -->

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