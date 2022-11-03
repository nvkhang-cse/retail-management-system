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

      <div class="card">
        <div class="card-header">
          <h5 class="d-md-inline">KẾT QUẢ KINH DOANH TRONG NGÀY</h5>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-outline-primary dropdown-toggle" data-toggle="dropdown">
              Tất cả chi nhánh
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">Tất cả chi nhánh</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 1</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 2</a>
            </div>
          </div>
        </div>
        <div class="card-body row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
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
            <div class="info-box">
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
            <div class="info-box">
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
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đơn huỷ</span>
                <span class="info-box-number">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5 class="d-md-inline">DOANH THU BÁN HÀNG</h5>
          <div class="btn-group d-inline-block float-md-right ml-md-3">
            <button type="button" class="btn btn-block btn-outline-primary dropdown-toggle" data-toggle="dropdown">
              Tất cả chi nhánh
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">Tất cả chi nhánh</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 1</a>
              <a href="javascript:void(0)" class="dropdown-item">Chi nhánh 2</a>
            </div>
          </div>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-outline-primary dropdown-toggle" data-toggle="dropdown">
              7 ngày qua
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="javascript:void(0)" class="dropdown-item">7 ngày qua</a>
              <a href="javascript:void(0)" class="dropdown-item">2 tuần qua</a>
              <a href="javascript:void(0)javascript:void(0)" class="dropdown-item">1 tháng qua</a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: 1 Jan, 2012 - 30 Jul, 2022</strong>
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
                <strong>Kết quả kinh doanh</strong>
              </p>

              <div class="progress-group">
                Doanh thu
                <span class="float-right"><b>3000000</b>/3000000</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 100%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Đơn huỷ
                <span class="float-right"><b>5</b>/20</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 25%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Đơn mới
                <span class="float-right"><b>500</b>/2000</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 25%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Đơn trả hàng
                <span class="float-right"><b>10</b>/20</span>
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
        <!-- <div class="card-footer">
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
            </div>
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
            </div>
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
            </div>
            <div class="col-sm-3 col-6">
              <div class="description-block">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
            </div>
          </div>
        </div> -->
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- /.row -->

      <div class="card">
        <div class="card-header">
          <h5 class="d-md-inline">ĐƠN HÀNG CHỜ XỬ LÝ</h5>
          <div class="btn-group d-inline-block float-md-right">
            <button type="button" class="btn btn-block btn-outline-primary dropdown-toggle" data-toggle="dropdown">
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
        <div class="card-body row">
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
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
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
                      <th>Mã sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Tổng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-primary">204900013</td>
                      <td>Kem Chống Nắng La Roche-Posay Kiểm Soát Dầu SPF50+ 50ml</td>
                      <td>2,250,000</td>
                    </tr>
                    <tr>
                      <td class="text-primary">422208972</td>
                      <td>Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường Đến Da Dầu 236ml Foaming Cleanser</td>
                      <td>2,216,000</td>
                    </tr>
                    <tr>
                      <td class="text-primary">422208973</td>
                      <td>Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường Đến Da Dầu 473ml Foaming Cleanser</td>
                      <td>2,000,000</td>
                    </tr>
                    <tr>
                      <td class="text-primary">422208974</td>
                      <td>Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường Đến Da Dầu 500ml Foaming Cleanser</td>
                      <td>1,560,000</td>
                    </tr>
                    <!-- <tr>
                      <td><a href="<?php echo base_url(); ?>/assets/pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div> -->
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
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
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
              <ul class="products-list product-list-in-card pl-3 pr-3">
                <li class="item">
                  <!-- <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div> -->
                  <div class="">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">Sản phẩm tồn kho
                      <span class="badge badge-info float-right">Xem chi tiết</span></a>
                    <span class="product-description">
                      400
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <!-- <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div> -->
                  <div class="">
                    <a href="<?php echo base_url(); ?>/assets/javascript:void(0)" class="product-title">Giá trị
                      <span class="badge badge-info float-right">Xem chi tiết</span></a>
                    <span class="product-description">
                      149,800,000
                    </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div> -->
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