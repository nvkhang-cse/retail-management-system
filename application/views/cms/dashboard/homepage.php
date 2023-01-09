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
          <div class="d-inline-block float-md-right">
            <select id="branch_code_for_statistic_in_date" class="custom-select border border-primary">
            </select>
          </div>
        </div>
        <div class="card-body row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Doanh thu</span>
                <span class="info-box-number" id="total_sales_in_day">
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
                <span class="info-box-text">Đơn hoàn thành</span>
                <span class="info-box-number" id="success_order_in_day">0</span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đơn đang giao</span>
                <span class="info-box-number" id="online_order_in_day">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đơn hủy</span>
                <span class="info-box-number" id="cancel_order_in_day">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5 class="d-md-inline">DOANH THU BÁN HÀNG</h5>
          <div class="d-inline-block float-md-right ml-md-2">
            <select id="branch_code_for_statistic_in_time" class="custom-select border border-primary">
            </select>
          </div>
          <div class="d-inline-block float-md-right mt-md-0 mt-2">
            <select id="time_value_for_statistic_in_time" class="custom-select border border-primary">
              <option value="week">7 ngày qua</option>
              <option value="this_month">Tháng này</option>
              <option value="last_month">Tháng trước</option>
            </select>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!-- <div class="row"> -->
          <!-- <div class="col-md-9"> -->
          <p class="text-center">
            <strong>Thời gian: 04-01-2023 đến 10-01-2023</strong>
          </p>

          <div class="chart">
            <!-- Sales Chart Canvas -->
            <canvas id="barChart" height="200" style="height: 200px;"></canvas>
          </div>
          <!-- /.chart-responsive -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-3 border border-info rounded">
              <p class="text-center">
                <strong>Kết quả kinh doanh</strong>
              </p>

              <div class="progress-group">
                Doanh thu
                <span class="float-right"><b></b>/0</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 20%"></div>
                </div>
              </div>

             
              <div class="progress-group">
                Đơn hoàn thành
                <span class="float-right"><b>0</b>/0</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 25%"></div>
                </div>
              </div>

          
              <div class="progress-group">
                Đơn đang giao
                <span class="float-right"><b>0</b>/0</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 25%"></div>
                </div>
              </div>

      
              <div class="progress-group">
                Đơn hủy
                <span class="float-right"><b>0</b>/0</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
              </div>
           
            </div> -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
    </div>
    <!-- /.card -->

    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent">
            <h5 class="d-md-inline">TOP SẢN PHẨM</h5>
            <div class="d-inline-block float-md-right">
              <select class="custom-select border border-primary">
                <option value="7">7 ngày qua</option>
                <option value="14">2 tuần qua</option>
                <option value="30">1 tháng qua</option>
              </select>
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
                    <td class="text-primary">3337875546430</td>
                    <td>Kem Chống Nắng La Roche-Posay Kiểm Soát Dầu SPF50+ 50ml</td>
                    <td>2,250,000</td>
                  </tr>
                  <tr>
                    <td class="text-primary">3499320014410</td>
                    <td>Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường Đến Da Dầu 236ml Foaming Cleanser</td>
                    <td>2,216,000</td>
                  </tr>
                  <tr>
                    <td class="text-primary">6928820030226</td>
                    <td>Nước Tẩy Trang L'Oreal Tươi Mát Cho Da Dầu, Hỗn Hợp 400ml Micellar Water 3-in-1 Refreshing Even For Sensitive Skin</td>
                    <td>2,000,000</td>
                  </tr>
                  <tr>
                    <td class="text-primary">8809335481063</td>
                    <td>Son Dưỡng Mediheal Hỗ Trợ Giảm Thâm Môi Ban Ngày 10ml Labocare Pantenolips Healssence</td>
                    <td>1,560,000</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- PRODUCT LIST -->
        <div class="card">
          <div class="card-header">
            <h5 class="d-md-inline">THÔNG TIN KHO</h5>
            <div class="d-inline-block float-md-right">
              <select id="branch_code_for_warehouse_report" class="custom-select border border-primary"> </select>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-3 pr-3">
              <li class="item">
                <div class="">
                  <a href="<?php echo base_url(); ?>dashboard/product/loadproductwarehouse" class="product-title">Sản phẩm tồn kho
                    <span class="badge badge-info float-right">Xem chi tiết</span></a>
                  <span class="product-description ml-2" id="total_product">
                    0
                  </span>
                </div>
              </li>
              <!-- /.item -->
              <li class="item">
                <!-- <div class="product-img">
                    <img src="<?php echo base_url(); ?>/assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                  </div> -->
                <div class="">
                  <a href="<?php echo base_url(); ?>dashboard/product/loadproductwarehouse" class="product-title">Giá trị tồn kho
                    <span class="badge badge-info float-right">Xem chi tiết</span></a>
                  <span class="product-description ml-2" id="total_product_value">
                    0
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