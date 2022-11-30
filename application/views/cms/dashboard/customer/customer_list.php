<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customer/loadCustomerAdd") ?>">
          <button type="button" class="btn btn-primary float-right" id="add_btn">+ Thêm khách hàng</button>
        </a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title text-primary">Thông tin khách hàng</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="customer-wrapper">
            <table id="customerListTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Mã khách hàng</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Nhóm khách hàng</th>
                  <th>Công nợ hiện tại</th>
                  <th>Tổng chi tiêu</th>
                  <th>Tổng số lượng đơn hàng</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->