<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm nhóm khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customergroup") ?>">
          <button type="button" class="btn btn-primary float-right" id="add_btn" style="background-color: #0087C2">Xem danh sách nhóm khách hàng</button>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form id="customer_group_data" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Thông tin nhóm khách hàng</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_group_name">Tên nhóm khách hàng*</label>
                    <input type="text" class="form-control" id="customer_group_name" name="customer_group_name" placeholder="Nhập tên nhóm khách hàng" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_group_code">Mã nhóm khách hàng*</label>
                    <input type="text" class="form-control" id="customer_group_code" name="customer_group_code" placeholder="Nhập mã nhóm khách hàng" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="customer_group_description">Mô tả</label>
                <textarea class="form-control" id="customer_group_description" name="customer_group_description" rows="5" placeholder=""></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Cài đặt</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="customer_group_discount">Chiết khấu (%)</label>
                <input type="text" class="form-control" id="customer_group_discount" name="customer_group_discount" placeholder="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary mr-2">Lưu</button>
        <a href="<?= site_url("dashboard/customergroup") ?>">
          <button type="button" class="btn btn-secondary">Hủy</button>
        </a>
      </div>
    </form>
  </div>
</section>