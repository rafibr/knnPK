<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Welcome') ?>" class="brand-link navbar-primary">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo SITE_NAME ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/Data_training') ?>" class="nav-link <?php echo ($this->uri->segment(1) == "admin/Data_training") && ($this->uri->segment(2) == "") ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-fw fa-database"></i>
                        <p>
                            Data Training
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/Data_target') ?>" class="nav-link <?php echo ($this->uri->segment(1) == "admin/Data_target") && ($this->uri->segment(2) == "") ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-fw fa-bullseye"></i>
                        <p>
                            Data Target
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/Akurasi') ?>" class="nav-link <?php echo ($this->uri->segment(1) == "admin/Akurasi") && ($this->uri->segment(2) == "") ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-arrows-alt-h"></i>
                        <p>
                            Akurasi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>