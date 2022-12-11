<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/product/loadproductcategory") ?>">
          <button type="button" class="btn btn-outline-primary float-sm-right ml-2">Quản lý loại sản phẩm</button>
        </a>
        <a href="<?= site_url("dashboard/product/loadproductadd") ?>">
          <button type="button" class="btn btn-primary float-sm-right">+ Thêm sản phẩm</button>
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
            <h5 class="card-title text-primary">Thông tin sản phẩm</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="product_wrapper">
            <table id="product_list_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Ảnh sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Thương hiệu</th>
                  <th>Xuất sứ</th>
                  <th>Barcode</th>
                  <th>Dung tích</th>
                  <th>Đơn vị</th>
                  <th>Số lượng</th>
                  <th>Giá tiền</th>
                  <th>Hạn sử dụng</th>
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