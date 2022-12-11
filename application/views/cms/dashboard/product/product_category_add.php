<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm mới loại sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/product/loadproductcategory") ?>">
          <button type="button" class="btn btn-outline-primary float-sm-right">Danh sách loại sản phẩm</button>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form id="product_category_data" method="post" enctype="multipart/form-data">
      <div class="card card-lightblue">
        <div class="card-header">
          <h5 class="card-title">Thông tin loại sản phẩm</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="category_name">Tên danh mục</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="category_code">Mã danh mục</label>
                <input type="text" class="form-control" id="category_code" name="category_code" placeholder="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="category_description">Mô tả</label>
            <textarea class="form-control" id="category_description" name="category_description" rows="5" placeholder=""></textarea>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary mr-2">Lưu</button>
        <a href="<?= site_url("dashboard/product/loadproductcategory") ?>">
          <button type="button" class="btn btn-secondary">Hủy</button>
        </a>
      </div>
    </form>
  </div>
</section>