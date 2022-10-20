<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="btn-group">
          <button class="btn btn-primary">Đơn 1</button>
          <button class="btn btn-outline-primary"><i class="fas fa-times-circle"></i></button>
          <button class="btn ml-2"><i class="fas fa-plus"></i></button>
        </div>
      </div>
      <div class="col-sm-6">
        <span class="float-sm-right text-primary">Chi nhánh mặc định</span>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-header">
            <div class="form-inline">
              <div class="input-group" data-widget="">
                <button class="btn">
                  <i class="fas fa-search"></i>
                </button>
                <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="product-wrapper">

            <button type="button" class="btn btn-primary btn-sm mb-2" id="delete_btn">Xóa sản phẩm</button>

            <table id="productListTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>STT</th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn vị</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <div class="form-inline">
              <div class="input-group" data-widget="">
                <div class="input-group-append">
                  <button class="btn">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
                <input class="form-control" type="search" placeholder="Tìm kiếm khách hàng" aria-label="Search">
                <button class="btn float-right"><i class="fas fa-plus"></i></button>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="">
            <div class="customer-phone">Điện thoại
              <span class="float-right">0979797979</span>
            </div>
            <div class="customer-address">Địa chỉ
              <span class="float-right">Thủ Đức, TP.HCM</span>
            </div>
            <div class="customer-money">Công nợ
              <span class="float-right">0</span>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card">
          <div class="card-header">
            <span>Thanh toán</span>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="">
            <div class="">Tổng tiền thanh toán
              <span class="float-right">1.500.000</span>
            </div>
            <div class="">Thuế
              <span class="float-right">0</span>
            </div>
            <div class="">Chiết khấu
              <span class="float-right">0</span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="card-body" id="">
            <div class="">Khách phải trả
              <span class="float-right">1.500.000</span>
            </div>
            <div class="">Khách đưa
              <input type="text" class="float-right" name="" id="" pattern="" value="" data-type="" placeholder="Nhập tiền khách đưa">
            </div>
            <div class="" style="clear:both">Tiền thừa
              <span class="float-right">0</span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="p-3">
            <button class="btn btn-info">Chọn hình thức thanh toán</button>
            <button class="btn btn-lg btn-primary float-right">Thanh toán</button>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->