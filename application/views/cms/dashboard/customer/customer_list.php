<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customer/loadcustomeradd") ?>">
          <button type="button" class="btn btn-primary float-right">+ Thêm khách hàng</button>
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
          <div class="card-body" id="customer_wrapper">
            <table id="customer_list_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Nhóm khách hàng</th>
                  <th>Tổng chi tiêu</th>
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

  <div class="modal fade" id="editCustomerInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="editCustomerForm" action="" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Thông tin khách hàng</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_name">Tên khách hàng</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" required>
                  <input type="text" class="form-control" name="customer_code" id="customer_code" value="" hidden>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_group">Nhóm khách hàng</label>
                  <select class="form-control" id="customer_group" name="customer_group">
                    <option value="0">Chưa phân nhóm</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_email">Email</label>
                  <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_phone">Số điện thoại</label>
                  <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_address">Địa chỉ cụ thể</label>
                  <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Số nhà, phường xã">
                </div>
              </div>
              <div class="col-sm-6">

              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_district">Quận/Huyện</label>
                  <input type="text" class="form-control" id="customer_district" name="customer_district" placeholder="Quận, huyện">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_city">Khu vực</label>
                  <input type="text" class="form-control" id="customer_city" name="customer_city" placeholder="Khu vực, thành phố">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_created_at">Ngày tạo</label>
                  <input type="text" class="form-control" id="customer_created_at" name="customer_created_at" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_updated_at">Ngày cập nhật</label>
                  <input type="text" class="form-control" id="customer_updated_at" name="customer_updated_at" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-customer-form">Lưu thông tin</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->