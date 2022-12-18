<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm mới sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/product") ?>">
          <button type="button" class="btn btn-outline-primary float-right">Xem danh sách sản phẩm</button>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form id="product_data" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Thông tin sản phẩm</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" required maxlength="250">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_code">Mã sản phẩm</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="" required maxlength="20">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_barcode">Barcode</label>
                    <input type="text" class="form-control" id="product_barcode" name="product_barcode" placeholder="Mã vạch sản phẩm" maxlength="30">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_brand">Thương hiệu</label>
                    <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="" maxlength="30">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_origin">Xuất sứ</label>
                    <input type="text" class="form-control" id="product_origin" name="product_origin" placeholder="" maxlength="30">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_quantity_warehouse">Số lượng trong kho</label>
                    <input type="number" class="form-control" id="product_quantity_warehouse" name="product_quantity_warehouse" placeholder="Số lượng khởi tạo ban đầu" required min="0">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_quantity_sale">Số lượng được bán</label>
                    <input type="number" class="form-control" id="product_quantity_sale" name="product_quantity_sale" placeholder="Số lượng cho phép bán" required min="0">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_capacity">Dung tích</label>
                    <input type="number" class="form-control" id="product_capacity" name="product_capacity" placeholder="" min="0">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_unit">Đơn vị</label>
                    <select class="form-control" id="product_unit" name="product_unit">
                      <option value="Không">Không</option>
                      <option value="ml">ml</option>
                      <option value="l">L</option>
                      <option value="g">g</option>
                      <option value="kg">Kg</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_expired_date">Ngày hết hạn</label>
                    <input type="date" class="form-control" pattern="\d{4}-\d{2}-\d{2}" id="product_expired_date" name="product_expired_date" placeholder="2025-01-30">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_published">Trạng thái</label>
                    <select class="form-control" id="product_published" name="product_published">
                      <option value="0">Không được bán</option>
                      <option value="1">Được bán</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Giá sản phẩm</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_cost">Giá nhập</label>
                    <input type="number" class="form-control" id="product_cost" name="product_cost" placeholder="" min="0">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_wholesale">Giá bán buôn</label>
                    <input type="number" class="form-control" id="product_wholesale" name="product_wholesale" placeholder="" min="0">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_retail">Giá bán lẻ</label>
                    <input type="number" class="form-control" id="product_retail" name="product_retail" placeholder="" min="0">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Chi tiết sản phẩm</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="product_description">Mô tả sản phẩm</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="5" placeholder="Mô tả về công dụng, thương hiệu, chi tiết,..."></textarea>
              </div>
              <div class="form-group">
                <label for="product_ingred">Thành phần</label>
                <textarea class="form-control" id="product_ingred" name="product_ingred" rows="5" placeholder=""></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Phân loại</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="product_category">Loại sản phẩm</label>
                <select class="form-control" id="product_category" name="product_category">
                  <option value="0">Chưa phân loại</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Kho</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="product_warehouse">Chọn chi nhánh</label>
                <select class="form-control" id="product_warehouse" name="product_warehouse">
                </select>
              </div>
            </div>
          </div>
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Ảnh sản phẩm</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <input type="file" id="product_file" name="product_file" class="d-none">
                <label for="product_file" class="text-primary">+ Thêm ảnh</label><br>
                <img src="<?php echo base_url(); ?>/assets/dist/img/product/default_photo.jpg" id="product_photo" class="img-rounded img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary mr-2">Lưu</button>
        <a href="<?= site_url("dashboard/product") ?>">
          <button type="button" class="btn btn-secondary">Hủy</button>
        </a>
      </div>
    </form>
  </div>
</section>