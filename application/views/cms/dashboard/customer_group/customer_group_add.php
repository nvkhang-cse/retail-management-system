<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm nhóm khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customergroup") ?>">
          <button type="button" class="btn btn-primary float-right">Xem danh sách nhóm khách hàng</button>
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
                    <label for="customer_group_name">Tên nhóm khách hàng</label>
                    <input type="text" class="form-control" id="customer_group_name" name="customer_group_name" placeholder="Nhập tên nhóm khách hàng">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_group_code">Mã nhóm khách hàng</label>
                    <input type="text" class="form-control" id="customer_group_code" name="customer_group_code" placeholder="">
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
                <input type="number" class="form-control" id="customer_group_discount" name="customer_group_discount" placeholder="">
              </div>
              <div class="form-group">
                <label for="customer_spend_from">Từ</label>
                <input type="number" class="form-control" id="customer_spend_from" name="customer_spend_from" placeholder="Thiết lập số tiền đã mua từ">
              </div>
              <div class="form-group">
                <label for="customer_spend_to">Đến</label>
                <input type="number" class="form-control" id="customer_spend_to" name="customer_spend_to" placeholder="Thiết lập số tiền đã mua đến">
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