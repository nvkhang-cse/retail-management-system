<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customer") ?>">
          <button type="button" class="btn btn-primary float-right" id="add_btn" style="background-color: #0087C2">Xem danh sách khách hàng</button>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form id="customer_data" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Thông tin khách hàng</h5>
            </div>
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_name">Tên khách hàng*</label>
                      <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Nhập tên khách hàng" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_code">Mã khách hàng*</label>
                      <input type="text" class="form-control" id="customer_code" name="customer_code" placeholder="Nhập mã khách hàng" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_group">Nhóm khách hàng*</label>
                      <input type="text" class="form-control" id="customer_group" name="customer_group" placeholder="Chọn nhóm khách hàng" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_phone">Số điện thoại*</label>
                      <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Thêm số điện thoại" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_email">Email</label>
                      <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Email của khách hàng">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card card-lightblue">
            <div class="card-header">
              <h5 class="card-title">Thông tin địa chỉ</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_cities">Khu vực</label>
                    <input type="text" class="form-control" id="customer_cities" name="customer_cities" placeholder="Khu vực, thành phố">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_district">Quận/Huyện</label>
                    <input type="text" class="form-control" id="customer_district" name="customer_district" placeholder="Quận, huyện">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_village">Phường/Xã</label>
                    <input type="text" class="form-control" id="customer_village" name="customer_village" placeholder="Phường, xã">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_address">Địa chỉ</label>
                    <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Số nhà">
                  </div>
                </div>
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
              <form>
                <div class="form-group">
                  <label>Chính sách giá</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Thuế</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>

                </div>
                <div class="form-group">
                  <label>Chiết khấu</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary mr-2">Lưu</button>
        <a href="<?= site_url("dashboard/customer") ?>">
          <button type="button" class="btn btn-secondary">Hủy</button>
        </a>
      </div>
    </form>
  </div>
</section>