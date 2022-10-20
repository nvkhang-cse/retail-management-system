<?php 
  $this->load->view('cms/layout/header');
?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="all_contents" class="wrapper">
    <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav id="nav_content" class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>/assets/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>/assets/index3.html" class="nav-link">Tổng quan</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>/assets/#" class="nav-link">Liên hệ</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="<?php echo base_url(); ?>/assets/#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url(); ?>/assets/#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>/assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>/assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>/assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url(); ?>/assets/#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>/assets/#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
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
  <aside id="leftsidebar_content" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>/assets/index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">K&K Cosmetics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url(); ?>/assets/#" class="d-block">Nguyen Duy Kien</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url("dashboard/homepage") ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng quan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
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
                <a href="<?= site_url("dashboard/product/loadproductwarehouse") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý kho</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url("dashboard/product/loadproducttrash") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thùng rác</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/assets/./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>#####</p>
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
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhóm khách hàng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
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
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Marketing
              </p>
            </a>
          </li>
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
              </p>
            </a>
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
  <aside id="rightsidebar_content" class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <a href="#" class="dropdown-item">
      <i class="fas fa-sign-out-alt mr-2"></i> Sign out
    </a>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer id="footer_content" class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="<?php echo base_url(); ?>/assets/https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
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
<!-- AdminLTE App -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
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
<!-- <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>/assets/plugins/datatables-select/js/dataTables.select.min.js"></script> -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.js"></script>


<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url(); ?>/assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>/assets/dist/js/pages/route.js"></script>
<script src="<?php echo base_url(); ?>/assets/dist/js/pages/product.js"></script>


<!-- <script>
  $(document).ready(function () {
    if(localStorage.getItem('auth_token'))
    {
      var index = <?php echo $index ?>;
      switch(index) {
        case 1:
          url_attr = "<?= site_url("api/dashboard/homepage/loadhomepage") ?>";
          break;
        case 2:
          var index2 = <?php echo $index2 ?>;
          if (index2==1){
            url_attr = "<?= site_url("api/dashboard/product/loadproductpage") ?>";
          }
          else if (index2==2){
            url_attr = "<?= site_url("api/dashboard/product/loadtrashpage") ?>";
          }
          else if (index2==3){
            url_attr = "<?= site_url("api/dashboard/product/loadaddpage") ?>";
          }
          else if (index2==4){
            url_attr = "<?= site_url("api/dashboard/product/loadwarehouse") ?>";
          }
          break;
      }
      // $.ajax({
      //   type: "POST",
      //   url: "<?= site_url("api/layout/page_layout/loadpagelayout") ?>",
      //   dataType: "json",
      //   encode: true,
      //   headers: {'Authorization': localStorage.getItem('auth_token')},
      //   success: function(response){
      //     $("#all_contents").html(response.data);
      //     $("#all_contents").on("load", load_maincontent());

      //   }
      // });
      load_maincontent(url_attr);
    }
    else{
      $('#nav_content').hide();
      $('#leftsidebar_content').hide();
      $('#rightsidebar_content').hide();
      $('#footer_content').hide();
    }
  });
  function load_maincontent(url_attr){
    $.ajax({
      type: "POST",
      url: url_attr,
      dataType: "json",
      encode: true,
      headers: {'Authorization': localStorage.getItem('auth_token')},
      success: function(response){
        $("#page_content").html(response.data);
        $("#page_content").on("load", add_script());
      }
    });
  }

  // $.ajax({
  //       type: "POST",
  //       url: "<?= site_url("api/dashboard/homepage/loadhomepage") ?>",
  //       dataType: "json",
  //       encode: true,
  //       headers: {'Authorization': localStorage.getItem('auth_token')},
  //       success: function(response){
  //         $("#homepage_content").html(response.data);
  //         $.when(add_rightsidebar(), add_navbar()).done(add_script());
  //       }
  //     });
  
  function add_script(){
    // $.getScript("<?php echo base_url(); ?>/assets/dist/js/adminlte.js");
    var index = <?php echo $index ?>;
      switch(index) {
        case 1:
          $.getScript("<?php echo base_url(); ?>/assets/dist/js/pages/dashboard2.js");
          break;
        case 2:
          // $.getScript("<?php echo base_url(); ?>/assets/dist/js/pages/product.js");
          // load_maincontent("<?= site_url("api/dashboard/product/loadtabledata") ?>");
          // function load_maincontent(url_attr){
          // var table;
          var index2 = <?php echo $index2 ?>;
          if (index2==1){
            url_attr = "<?= site_url("api/dashboard/product/loadtabledata") ?>";
            var table;
            var data_table;

            $.ajax({
              type: "POST",
              url: url_attr,
              dataType: "json",
              encode: true,
              async: false,
              headers: {'Authorization': localStorage.getItem('auth_token')},
              success: function(response) {
                  // getResponse(response);
                  data_table = response
              },          
            });

            table = $('#example1').DataTable({
                data: data_table.data,
                // columnDefs: [ {
                //     orderable: false,
                //     className: 'select-checkbox',
                //     data: 'id',
                //     targets:   0
                // } ],
                columns: [
                  { 
                    // "targets": [0],
                    'searchable': false,
                    'orderable': false,
                    // 'className': 'select-checkbox',
                    data: 'id'
                  },
                  { data: 'title' },
                  { data: 'product_code' },
                  { data: 'brand' },
                  { data: 'origin' },
                  { data: 'capacity' },
                  { data: 'quantity' },
                  { data: 'price' },
                  { data: null, 
                    defaultContent: '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Dropdown link</a><a class="dropdown-item" href="#">Dropdown link</a></div></div>' ,
                    'className': 'dt-body-center',
                    'searchable': false,
                    'orderable': false,
                  }

                ],
                "order": [[1, 'asc']],
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false,
                "buttons": [
                  "copy", 
                  "csv", 
                  "excel", 
                  "pdf", 
                  "print", 
                  "colvis"
                ]
              });
              // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')

            $('#delete_btn').on('click', function(){
              var selected_rows = table.column(0).data();
              // $.each(selected_rows, function(key, id){
              //   console.log( id);
              // });
              console.log(selected_rows);

            });



            
          }
          else if (index2==2){
            url_attr = "";
          }          
          else if (index2==3){
            url_attr = "";
          }






          // var table;
          // table = fillProductTable(url_attr);
          // console.log(table);
          
          // $('#delete_btn').click(async () => {
          //   const imgUrl = await findRandomImgPromise('cat');
          //   $('#cat').attr('src', imgUrl);
          // });

          // async function test(ajaxurl) {
          //   try {
          //     const res = await getProductData(ajaxurl);
          //     table = await fillProductTable(res);
          //     console.log(table);

          //   } catch(err) {
          //     console.log(err);
          //   }
          // }
          // test(url_attr);


          // $('#request').click(async () => {
          //   const imgUrl = await findRandomImgPromise('cat');
          //   $('#cat').attr('src', imgUrl);
          // });

          // getProductData(url_attr).then((res) => {
          //   table = res
          // });
          // console.log(table)

          // function getResponse(response) {
          //   table = $('#example1').DataTable({
          //     data: response.data,
          //     columns: [
          //       { 
          //         "targets": [0],
          //         'searchable': false,
          //         'orderable': false,
          //         'className': 'dt-body-center',
          //         'checkboxes': {
          //           'selectRow': true
          //         },
          //         data: 'id'
          //       },
          //       { data: 'title' },
          //       { data: 'product_code' },
          //       { data: 'brand' },
          //       { data: 'origin' },
          //       { data: 'capacity' },
          //       { data: 'quantity' },
          //       { data: 'price' },
          //       { data: null, 
          //         defaultContent: '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Dropdown link</a><a class="dropdown-item" href="#">Dropdown link</a></div></div>' ,
          //         'className': 'dt-body-center',
          //         'searchable': false,
          //         'orderable': false,
          //       }

          //     ],
          //     "order": [[1, 'asc']],
          //     "responsive": true, 
          //     "lengthChange": false, 
          //     "autoWidth": false,
          //     "buttons": [
          //       "copy", 
          //       "csv", 
          //       "excel", 
          //       "pdf", 
          //       "print", 
          //       "colvis"
          //     ]
          //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          // }
          function fillProductTable(res){
            // const res = getProductData(ajaxurl);
            return $('#example1').DataTable({
              data: res.data,
              columns: [
                { 
                  "targets": [0],
                  'searchable': false,
                  'orderable': false,
                  'className': 'dt-body-center',
                  'checkboxes': {
                    'selectRow': true
                  },
                  data: 'id'
                },
                { data: 'title' },
                { data: 'product_code' },
                { data: 'brand' },
                { data: 'origin' },
                { data: 'capacity' },
                { data: 'quantity' },
                { data: 'price' },
                { data: null, 
                  defaultContent: '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Dropdown link</a><a class="dropdown-item" href="#">Dropdown link</a></div></div>' ,
                  'className': 'dt-body-center',
                  'searchable': false,
                  'orderable': false,
                }

              ],
              "order": [[1, 'asc']],
              "responsive": true, 
              "lengthChange": false, 
              "autoWidth": false,
              "buttons": [
                "copy", 
                "csv", 
                "excel", 
                "pdf", 
                "print", 
                "colvis"
              ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          }

          // function getProductData(ajaxurl) { 
          //   return $.ajax({
          //     type: "POST",
          //     url: ajaxurl,
          //     dataType: "json",
          //     encode: true,
          //     headers: {'Authorization': localStorage.getItem('auth_token')}, 
          //   });
          // };
          break;
        case 3:
          
          break;

      }
  }
</script> -->




</body>
</html>

