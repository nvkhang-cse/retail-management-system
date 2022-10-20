<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav id="nav_content" class="main-header navbar navbar-expand navbar-dark">
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside id="leftsidebar_content" class="main-sidebar sidebar-dark-primary elevation-4">
  </aside>
  <!-- /.main-sidebar-container -->


  <!-- Content Wrapper. Contains page content -->
  <div id="homepage_content" class="content-wrapper">
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside id="rightsidebar_content" class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="<?php echo base_url(); ?>/assets/https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>


<script>
  $(document).ready(function () {
    if(localStorage.getItem('auth_token'))
    {
      $.ajax({
        type: "POST",
        url: "<?= site_url("api/dashboard/dashboard/loaddashboard") ?>",
        dataType: "json",
        encode: true,
        headers: {'Authorization': localStorage.getItem('auth_token')},
        success: function(response){
          $("#homepage_content").html(response.data);
          $.when(add_leftsidebar(), add_rightsidebar(), add_navbar()).done(add_script());
        }
      });
    }
  });
  function add_leftsidebar(){
    $.ajax({
      type: "POST",
      url: "<?= site_url("api/layout/sidebar/loadleftsidebar") ?>",
      dataType: "json",
      encode: true,
      headers: {'Authorization': localStorage.getItem('auth_token')},
      success: function(response){
        $("#leftsidebar_content").html(response.data);     
      }
    });
  }
  function add_rightsidebar(){
    $.ajax({
      type: "POST",
      url: "<?= site_url("api/layout/sidebar/loadrightsidebar") ?>",
      dataType: "json",
      encode: true,
      headers: {'Authorization': localStorage.getItem('auth_token')},
      success: function(response){
        $("#rightsidebar_content").html(response.data);     
      }
    });
  }
  function add_navbar(){
    $.ajax({
      type: "POST",
      url: "<?= site_url("api/layout/navbar/loadnavbar") ?>",
      dataType: "json",
      encode: true,
      headers: {'Authorization': localStorage.getItem('auth_token')},
      success: function(response){
        $("#nav_content").html(response.data);     
      }
    });
  }
  function add_script(){
    $.getScript("<?php echo base_url(); ?>/assets/plugins/chart.js/Chart.min.js");
    $.getScript("<?php echo base_url(); ?>/assets/dist/js/pages/dashboard2.js");
  }


</script>
</body>

</html>