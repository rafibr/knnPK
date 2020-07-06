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
              <h1 class="m-0 text-dark">Home</h1>
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
            <div >
              <div class="card-header">
                

                <div>

                  <!-- Content Row -->
                  <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Training
                              </div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800">
                                  Jumlah Data Training = <?= $training->training ?>
                              </div>
                              <br>
                              <div>
                              <a href type="button" class="btn btn-info">Lihat Data</a>
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
                                Data Target
                              </div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800">
                                  Jumlah Data Target = <?= $target->target ?>
                              </div>
                              <br>
                              <div>
                              <a href="<?= site_url('target')?>" type="button" class="btn btn-info">Lihat Data</a>
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
                                Data Testing
                              </div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800">
                                  Jumlah Data Testing = <?= $testing->testing ?>
                              </div>
                              <br>
                              <div>
                              <a href="<?= site_url('akurasi')?>" type="button" class="btn btn-info">Lihat Data</a>
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