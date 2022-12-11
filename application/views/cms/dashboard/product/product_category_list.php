<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách loại sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/product") ?>">
          <button type="button" class="btn btn-outline-primary float-sm-right ml-2">Danh sách sản phẩm</button>
        </a>
        <a href="<?= site_url("dashboard/product/loadproductcategoryadd") ?>">
          <button type="button" class="btn btn-primary float-sm-right ">+ Thêm loại sản phẩm</button>
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
            <h5 class="card-title text-primary">Thông tin loại sản phẩm</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="product_category_wrapper">
            <table id="product_category_list_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Tên danh mục</th>
                  <th>Mã danh mục</th>
                  <th>Mô tả</th>
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