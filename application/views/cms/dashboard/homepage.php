  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
          <h1 class="m-0">TỔNG QUAN</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row mb-3">
        <!-- Custom filter -->
        <div class="col-12">
          <h5 class="d-md-inline">KẾT QUẢ KINH DOANH TRONG NGÀY</h5>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown">
              Tất cả chi nhánh
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">Tất cả chi nhánh</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 1</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 2</a>
            </div>
          </div>
        </div>
        <!-- /.end custom filter -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Doanh thu</span>
              <span class="info-box-number">
                0
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cart-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Đơn hàng mới</span>
              <span class="info-box-number">10</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Đơn trả hàng</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Đơn huỷ</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row mb-3">
        <div class="col-12">
          <h5 class="d-md-inline">DOANH THU BÁN HÀNG</h5>
          <div class="btn-group d-inline-block float-md-right ml-md-3">
            <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown">
              Tất cả chi nhánh
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">Tất cả chi nhánh</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 1</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 2</a>
            </div>
          </div>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown">
              7 ngày qua
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">7 ngày qua</a>
              <a href="javascript:void(0)" class="dropdown-item">2 tuần qua</a>
              <a href="javascript:void(0)javascript:void(0)" class="dropdown-item">1 tháng qua</a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    Add Products to Cart
                    <span class="float-right"><b>160</b>/200</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group">
                    Complete Purchase
                    <span class="float-right"><b>310</b>/400</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-danger" style="width: 75%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="float-right"><b>480</b>/800</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    Send Inquiries
                    <span class="float-right"><b>250</b>/500</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block">
                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row mb-3">
        <!-- Custom filter -->
        <div class="col-12">
          <h5 class="d-md-inline">ĐƠN HÀNG CHỜ XỬ LÝ</h5>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown">
              7 ngày qua
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">1 ngày qua</a>
              <a href="javascript:void(0)" class="dropdown-item">7 ngày qua</a>
              <a href="javascript:void(0)" class="dropdown-item">1 tháng qua</a>
            </div>
          </div>
        </div>
        <!-- /.end custom filter -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Chờ duyệt</span>
              <span class="info-box-number">
                0
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-cart-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Chờ thanh toán</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-cart-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Chờ đóng gói</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Chờ lấy hàng</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-cart-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Đang giao hàng</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><i class="text-primary fas fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Huỷ đơn hàng</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h5 class="card-title">TOP SẢN PHẨM</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-primary dropdown-toggle" data-toggle="dropdown">
                  7 ngày qua
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="javascript:void(0)" class="dropdown-item">1 ngày qua</a>
                  <a href="javascript:void(0)" class="dropdown-item">7 ngày qua</a>
                  <a href="javascript:void(0)" class="dropdown-item">1 tháng qua</a>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">THÔNG TIN KHO</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-primary dropdown-toggle" data-toggle="dropdown">
                  Tất cả chi nhánh
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="javascript:void(0)" class="dropdown-item">Tất cả chi nhánh</a>
                  <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 1</a>
                  <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 2</a>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">Samsung TV
                      <span class="badge badge-warning float-right">$1800</span></a>
                    <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">Bicycle
                      <span class="badge badge-info float-right">$700</span></a>
                    <span class="product-description">
                      26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">
                      Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                    </a>
                    <span class="product-description">
                      Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">PlayStation 4
                      <span class="badge badge-success float-right">$399</span></a>
                    <span class="product-description">
                      PlayStation 4 500GB Console (PS4)
                    </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
  <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->