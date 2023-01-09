<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách loại sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/product/loadproductwarehouse") ?>">
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

  <div class="modal fade" id="editProductCategoryInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="editProductCategoryForm" action="" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Thông tin loại sản phẩm</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Tên danh mục:</label>
              <input type="text" class="form-control" id="category_name" name="category_name" placeholder="" required>
              <input type="text" class="form-control" name="product-category-code" id="product-category-code" value="" hidden>
            </div>
            <div class="form-group">
              <label for="category_description">Mô tả</label>
              <textarea class="form-control" id="category_description" name="category_description" rows="5" placeholder=""></textarea>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="category_created_at">Ngày tạo</label>
                  <input type="text" class="form-control" id="category_created_at" name="category_created_at" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="category_updated_at">Ngày cập nhật</label>
                  <input type="text" class="form-control" id="category_updated_at" name="category_updated_at" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-form">Lưu thông tin</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->