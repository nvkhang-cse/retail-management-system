<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>K&K Cosmetics</title>

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/cms/home/logo.png" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- OverlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme Style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-select/css/select.bootstrap4.min.css">
  <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/style/style.css">

  <!-- <link type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" /> -->
  <!-- <link type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" rel="stylesheet" /> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div id="all_contents" class="wrapper">
    <!-- Preloader -->

    <!-- Navbar -->
    <nav id="nav_content" class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>/assets/#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url(); ?>/assets/#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="javascript:void(0)" class="dropdown-item">
              <div class="media">
                <img src="<?php echo base_url(); ?>/assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nguyễn Văn Khang
                  </h3>
                  <p class="text-sm">Cập nhật tính năng thêm khách hàng</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <div class="media">
                <img src="<?php echo base_url(); ?>/assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nguyễn Duy Kiên
                  </h3>
                  <p class="text-sm">Thêm tính năng thêm sản phẩm</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <div class="media">
                <img src="<?php echo base_url(); ?>/assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nguyễn Duy Kiên
                  </h3>
                  <p class="text-sm">Thêm tính năng quản lý kho</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li> -->
        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url(); ?>/assets/">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="<?php echo base_url(); ?>/assets/#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside id="left_sidebar_content" class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= site_url("dashboard/homepage") ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>/assets/cms/home/logo.png" alt="K&K Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">K&K Cosmetics</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url(); ?>/assets/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Nguyễn Duy Kiên</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= site_url("dashboard/homepage") ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Tổng quan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url("dashboard/sales") ?>" class="nav-link">
                <i class="nav-icon fas fa-hand-holding"></i>
                <p>
                  Bán tại quầy
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Đơn hàng
                  <!-- <i class="fas fa-angle-left right"></i> -->
                </p>
              </a>
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách đơn hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tạo đơn hàng</p>
                  </a>
                </li>
              </ul> -->
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                  Sản phẩm
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url("dashboard/product") ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách sản phẩm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lý kho</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhập hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Chuyển hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kiểm hàng</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Khách hàng
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url("dashboard/customer") ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Khách hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url("dashboard/customergroup") ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhóm khách hàng</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Vận chuyển
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lý giao hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đối tác vận chuyển</p>
                  </a>
                </li>
              </ul>
            </li> -->
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-flag"></i>
                <p>
                  Marketing
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Sổ quỹ
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tổng hợp sổ quỹ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Phiếu thu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Phiếu chi</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  Báo cáo
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-share-alt-square"></i>
                <p>
                  Khuyến mãi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Quản lý hệ thống
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Chi nhánh</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhân viên</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- /.main-sidebar-container -->

    <!-- Content Wrapper. Contains page content -->
    <div id="page_content" class="content-wrapper">
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside id="right_sidebar_content" class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="row ml-4 mt-2 ">
        <a href="<?= site_url("api/authentication/signout/logout") ?>" class="col-12">
          <i class="fas fa-sign-out-alt mr-2"></i> Sign out
        </a>
      </div>

    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <!-- <footer id="footer_content" class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="<?php echo base_url(); ?>/assets/https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer> -->
  </div>
  <input type="hidden" id="idx1" value="<?php echo $index ?>" />
  <input type="hidden" id="idx2" value="<?php echo $index2 ?>" />

  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url(); ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url(); ?>/assets/plugins/chart.js/Chart.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.js"></script>
  <!-- My Script -->
  <script src="<?php echo base_url(); ?>/assets/dist/js/pages/route.js"></script>
  <script src="<?php echo base_url(); ?>/assets/dist/js/pages/product.js"></script>
  <script src="<?php echo base_url(); ?>/assets/dist/js/pages/customer.js"></script>
  <script src="<?php echo base_url(); ?>/assets/dist/js/pages/customergroup.js"></script>
</body>

</html>