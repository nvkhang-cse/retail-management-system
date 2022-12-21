<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <button class="btn btn-primary">Đơn 1</button>
        <button class="btn"><i class="fas fa-plus"></i></button>
      </div>
      <div class="col-sm-6">
        <div class="float-right">
          <select id="branch_code" class="custom-select border border-primary">
          </select>
        </div>
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
              <button class="btn">
                <i class="fas fa-search"></i>
              </button>
              <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="product-wrapper">

            <button type="button" class="btn btn-primary btn-sm mb-2" id="delete_btn">Xóa sản phẩm</button>

            <table id="productListTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn vị</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Chiết khấu</th>
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
              <button class="btn">
                <i class="fas fa-search"></i>
              </button>
              <input class="form-control" type="search" placeholder="Tìm kiếm khách hàng" aria-label="Search">
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
            <div class="customer-money">Nhóm
              <span class="float-right">Đồng</span>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Thanh toán</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="">
            <div class="">Tổng tiền thanh toán
              <span class="float-right">0</span>
            </div>
            <div class="mt-2">Chiết khấu (%)
              <span class="float-right">0</span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="card-body">
            <div class="">Khách phải trả
              <span class="float-right">0</span>
            </div>
            <div class="mt-2">
              <input type="number" class="form-control" name="" placeholder="Nhập tiền khách đưa">
            </div>
            <div class="mt-2">Tiền thừa
              <span class="float-right">0</span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="p-3">
            <div class="float-right">
              <button class="btn btn-lg btn-secondary mr-2">Hủy</button>
              <button class="btn btn-lg btn-primary">Thanh toán</button>
            </div>
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